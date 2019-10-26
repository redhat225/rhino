<?php
namespace App\Controller\Manager;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Cache\Cache;
use Goutte\Client as Goutte;
use GuzzleHttp\Client as GuzzleHttp;
use GuzzleHttp\Exception\ConnectException;
/**
 * ManagerOperators Controller
 *
 * @property \App\Model\Table\ManagerOperatorsTable $ManagerOperators
 */
class ManagerOperatorsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->config('loginAction',['controller'=>'ManagerOperators','action'=>'login']);
        $this->Auth->config('authenticate',['Form'=>[
                        'fields' => ['username' => 'username', 'password'=>'password'] ,
                        'finder' => 'authmanager',
                        'userModel'=>'ManagerOperators',
                        'prefix'=>'manager'
                        ]
            ]);
        $this->Auth->config('logoutRedirect',['controller'=>'ManagerOperators','action'=>'login']);

        $this->viewBuilder()->layout('dashboard');
        $this->Auth->allow(['forgotten','login']);  
    }

    public function account()
    {
        if($this->request->is('ajax'))
        {
            if($this->request->is('get'))
            {
                $manager = $this->Auth->user();
                $this->set(compact('manager'));
            }
        }

            if($this->request->is('post'))
            {
                $data = $this->request->data;
                $manager_operator = $this->ManagerOperators->get($data['manager_id']);

                $manager_operator = $this->ManagerOperators->patchEntity($manager_operator, $data);
                $manager_operator->updateProfile=true;
                $manager_operator->slug = $this->Auth->user('institution.slug');
                if($this->ManagerOperators->save($manager_operator))
                {
                    $this->Flash->success(__('Modifications effectuées avec succès, veuillez vous reconnecter pour constater les changements'));
                }
                else
                {
                    $this->Flash->error(__('Vous n\'avez pas le droit d\'effectuer cette opération'));
                }
                    return $this->redirect(['controller'=>'ManagerOperators','action'=>'general#account']);
            }
    }


    public function beforeRender(Event $event)
    {
        parent::beforeRender($event);
        $institution_id = $this->Auth->user('institution_id'); 
        $prefix = $this->Auth->user('prefix');
        $this->set(compact('institution_id','prefix'));  
    }

    public function login()
    {

        if($this->request->session()->read('Auth.User')!==null)
        {
            return $this->redirect(['action'=>'general']);
        }
        else
        {
            if($this->request->is('ajax'))
            {
                if($this->request->is('post'))
                {
                    $user = $this->Auth->identify();
                    if($user)
                    {
                        $this->Auth->setUser($user);
                        $this->request->session()->write('Auth.User.prefix','manager');
                        echo "ok";
                    }
                    else
                    {
                        sleep(5);
                        echo "ko";
                    }
                    exit();
                }
            }
            $this->viewBuilder()->layout('login');            
        }

    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    public function general()
    {
        if($this->request->is('ajax'))
        {
            if($this->request->is('get'))
            {
                $this->loadModel('Institutions');
                //find assets institution
                $institution = $this->Institutions->find()->where(['id'=>$this->Auth->user('institution_id')])->first();
                //loading bills info
                $name_month = $this->getting_french_full_name_month();
                $paid_invoices = $this->ManagerOperators->VisitInvoices->find('monthlyPaid');
                $unpaid_invoices = $this->ManagerOperators->VisitInvoices->find('monthlyUnpaid');
                $monthly_number =  $this->ManagerOperators->VisitInvoices->find('monthlyNumber')->first()->toArray()['total'];
                $annual_number =  $this->ManagerOperators->VisitInvoices->find('annualNumber')->first()->toArray()['total'];
                //find infos for some register form in general  floating box
                $this->loadModel('Doctors');
                $this->loadModel('VisitSpecialities');
                $this->loadModel('Patients');
                $visit_specialities = $this->VisitSpecialities->find();
                $doctors = $this->Doctors->find()->contain(['People']);
                $patients = $this->Patients->find()->contain(['People']);

                


                $this->set(compact('insurers','doctors','visit_meeting_specialities','institution','name_month','paid_invoices','unpaid_invoices','monthly_number','annual_number','patients'));
            }
        }
        else
        {
            $this->loadModel('Doctors');
            $this->loadModel('VisitSpecialities');
            $this->loadModel('VisitStateTypes');
            $this->loadModel('VisitLevels');
            $this->loadModel('VisitKindTransports');
            $this->loadModel('PatientInsurers');


            $doctors = $this->Doctors->find()->contain(['People'])->where(['Doctors.id<>0']);
            $specialities = $this->VisitSpecialities->find();
            $visit_state_types = $this->VisitStateTypes->find()->where(['label_state_type'=>'Consultation'])->orWhere(['label_state_type'=>'Urgences']);
            $visit_state_types_full =  $this->VisitStateTypes->find();
            $visit_levels = $this->VisitLevels->find();
            $visit_kind_transports = $this->VisitKindTransports->find();
            $insurers = $this->PatientInsurers->find('all');
            $manager = $this->Auth->user();
            $managers = $this->ManagerOperators->find('all')->contain(['People'])
                        ->where(['ManagerOperators.institution_id'=>$this->Auth->user('institution_id')]);
            $manager_id = $this->Auth->user('id');



            // debug($specialities->toArray());
            $this->set(compact('visit_state_types_full','manager_id','managers','insurers','doctors','specialities','visit_state_types','visit_levels','visit_kind_transports','manager'));
            $this->render('blank_general');
            
        }
    }

    private function getting_french_full_name_month()
    {
        $nowDate =new \DateTime('NOW');
        $months = ['Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre'];
        $month_index = $nowDate->format('m');
        for($i=1;$i<=count($months);$i++)
        {
            if($month_index == $i)
               $month_name = $months[$i-1];
        }
        return $month_name.' '.$nowDate->format('Y');
    }


    public function searchSingle()
    {
        if($this->request->is('ajax'))
        {
            if($this->request->is('get'))
            {
                $query_data = $this->request->query('people-id');
                $manager_operator = $this->ManagerOperators->find()
                                                           ->contain(['People.PeopleContacts','People.PeopleAttributes','People.PeopleSituations','Visits'=>function($q){return $q->order(['Visits.created'=>'DESC']);},'Visits.VisitInvoices','Institutions','Visits.Patients.People','People.PeopleAdresses.CountryTownships.CountryCities.Countries'])
                                                            ->where(['People.id'=>$query_data])
                                                            ->map(function($row){
                                                                    foreach ($row->visits as $visit) {
                                                                        foreach ($visit->visit_invoices as $visit_invoice) {

                                                                            $formatted_created = new \DateTime($visit_invoice->created);
                                                                            $visit_invoice->formatted_created = $formatted_created->format('d-m-Y H:i:s');

                                                                            if($visit_invoice->sold_date)
                                                                            {
                                                                                $formatted_solded = new \DateTime($visit_invoice->sold_date);
                                                                                $visit_invoice->formatted_solded = $formatted_solded->format('d-m-Y H:i:s');
                                                                            }
                                                                            else
                                                                            {
                                                                                $visit_invoice->formatted_solded = null;
                                                                            }
                                                                            

                                                                                                            //building image_src invoice
                                                                                    $countdown = 0;
                                                                                    $search = true;

                                                                                    while($search) 
                                                                                    {
                                                                                        if(file_exists(WWW_ROOT."Files/manager/".$row->institution->slug."/invoices_images/".$visit_invoice->code_invoice.'-'.$countdown.'.jpg'))
                                                                                        {
                                                                                            $countdown++;
                                                                                        }
                                                                                        else
                                                                                        {
                                                                                            $search = false;
                                                                                            $visit_invoice->bill_image_count = $countdown;
                                                                                        }
                                                                                        
                                                                                    }

                                                                        }
                                                                    }
                                                                    return $row;
                                                            });

                if($manager_operator)
                {
                    echo json_encode($manager_operator);
                }
                else
                    echo 'ko';

                exit();
            }
        }
    }

    public function test()
    {
        $CakePdf = new \CakePdf\Pdf\CakePdf();
        $CakePdf->template('test', 'blank');
        
        $value = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis ab ea voluptate est enim. Debitis odit, quidem suscipit sapiente facilis sed pariatur maiores voluptatibus, enim, harum laborum dolores asperiores corporis!';
        
        $CakePdf->viewVars(['value'=>$value]);
        
        $pdf = $CakePdf->output();
        $pdf = $CakePdf->write(APP .'newsletter.pdf');

        // if($pdf===true)
        // {
        //     debug('yes');
        // }
        // else
        // {
        //     debug('no');
        // }

        // die();

        // return $this->redirect(['action'=>'general']);
        // exit();
    }

    public function generalStats()
    {
        if($this->request->is('ajax'))
        {
          if($this->request->is('get'))
          {
                            //loading info for building graph transactions
                $this->loadModel('VisitInvoices');
                $now = new \DateTime('NOW');
                $date_from = $now->format('Y-m-01 00:00:00');
                $date_to = $now->format('Y-m-31 00:00:00');
                $invoices_grouping_amount = $this->VisitInvoices->find()
                                 ->contain(['ManagerOperators'=>function($q){
                                    return $q->order(['ManagerOperators.institution_id'=>$this->Auth->user('institution_id')]);
                                 }])
                                 ->select(['formatted_created'=>'DATE_FORMAT(VisitInvoices.created,"%d-%m-%Y")','amount'=>'sum(amount)'])
                                 ->where(function($q) use($date_from, $date_to){
                                    return $q->between('VisitInvoices.created',$date_from,$date_to);
                                 })
                                 ->order(['formatted_created'=>'ASC'])
                                 ->group('formatted_created');

                $month_name = $this->getting_french_full_name_month();

                if($invoices_grouping_amount)
                {
                    $response = [$month_name, json_encode($invoices_grouping_amount)];
                    echo json_encode($response);
                }
                else
                {
                    $response = false;
                    echo $response;
                }

               exit();
          }
        }
    }

    public function singleStateBuilder()
    {

        if($this->request->is('ajax'))
        {
            if($this->request->is('post'))
            {
                $data = $this->request->data;
                $start_date = $data['start-date-state'].' 00:00:00';
                $end_date = $data['end-date-state'].' 23:59:59';

                $formatted_start_date = new \DateTime($data['start-date-state']);
                $formatted_end_date = new \DateTime($data['end-date-state']);
                
                $this->loadModel('VisitInvoices');
                 $manager_operator_operations = $this->VisitInvoices->find()
                                                            ->contain(['Visits.Patients.People','VisitInvoicePayments.VisitInvoicePaymentSchedules'])
                                                            ->where(['VisitInvoices.manager_operator_id'=>$data['manager-id']])
                                                            ->andWhere(function($q) use($start_date, $end_date){
                                                                return $q->between('VisitInvoices.created',$start_date, $end_date);
                                                            })
                                                            ->order(['VisitInvoices.created'=>'DESC'])
                                                            ->autoFields(true)
                                                            ->map(function($row){

                                                                    $countdown = 0;
                                                                    $count_sold = 0;
                                                                    $count_unsold = 0;
                                                                    foreach ($row->visit_invoice_payments as $payment) 
                                                                    {
                                                                        if($payment->state==1)
                                                                        {
                                                                            $count_sold++;
                                                                        }
                                                                        else
                                                                        {
                                                                            $count_unsold++;
                                                                        }

                                                                        $countdown++;
                                                                    }

                                                                    $row->count_payments=$countdown;
                                                                    $row->count_sold=$count_sold;
                                                                    $row->count_unsold=$count_unsold;

                                                                            $formatted_created = new \DateTime($row->created);
                                                                            $row->formatted_created = $formatted_created->format('d-m-Y H:i:s');

                                                                            if($row->sold_date)
                                                                            {
                                                                                $formatted_solded = new \DateTime($row->sold_date);
                                                                                $row->formatted_solded = $formatted_solded->format('d-m-Y H:i:s');
                                                                            }
                                                                            else
                                                                            {
                                                                                $row->formatted_solded = null;
                                                                            }

                                                                    return $row;
                                                            });

                                        if($manager_operator_operations)
                                        {
                                            $manager_operator_identity = $this->ManagerOperators->find()
                                                                                                ->contain(['Institutions','People'])
                                                                                                ->where(['ManagerOperators.id'=>$data['manager-id']])
                                                                                                ->first();
                                        
                    
                                            $manager_operator_bars_charts = $this->VisitInvoices->find()
                                                                                                ->select(['total_sum'=>'sum(VisitInvoices.amount)','created_date'=>'DATE_FORMAT(VisitInvoices.created,"%d-%m-%Y")',
                                                                                                    ])
                                                                                                ->contain(['ManagerOperators.Institutions'=>function($q){return $q->order(['Institutions.id'=>$this->Auth->user('institution_id')]);}])
                                                                                                ->where(function($q) use($start_date, $end_date){
                                                                                                    return $q->between('VisitInvoices.created',$start_date,$end_date);
                                                                                                })
                                                                                                ->group(['created_date']);
                                            //build url for pdf-view
                                            $pdf_view_url = '/manager/manager-operators/single-state-builder/'.$start_date.'/'.$end_date.'/'.$data['manager-id'].'/.pdf';

                                            $this->set(compact('pdf_view_url','manager_operator_bars_charts','manager_operator_identity','manager_operator_operations','formatted_start_date','formatted_end_date'));
                                        }
                                        else
                                        {
                                            echo 'ko';
                                            exit();
                                        }
            }
        }else
        {
            if($this->request->params['_ext']==='pdf')
            {
                $data = $this->request->params['pass'];
                $start_date = $data[0];
                $end_date = $data[1];

                $formatted_start_date = new \DateTime($start_date);
                $formatted_end_date = new \DateTime($end_date);
                

                $this->loadModel('VisitInvoices');
                 $manager_operator_operations = $this->VisitInvoices->find()
                                                            ->contain(['Visits.Patients.People','VisitInvoicePayments.VisitInvoicePaymentSchedules'])
                                                            ->where(['VisitInvoices.manager_operator_id'=>$data[2]])
                                                            ->andWhere(function($q) use($start_date, $end_date){
                                                                return $q->between('VisitInvoices.created',$start_date, $end_date);
                                                            })
                                                            ->order(['VisitInvoices.created'=>'DESC'])
                                                            ->autoFields(true)
                                                            ->map(function($row){

                                                                    $countdown = 0;
                                                                    $count_sold = 0;
                                                                    $count_unsold = 0;
                                                                    foreach ($row->visit_invoice_payments as $payment) 
                                                                    {
                                                                        if($payment->state==1)
                                                                        {
                                                                            $count_sold++;
                                                                        }
                                                                        else
                                                                        {
                                                                            $count_unsold++;
                                                                        }

                                                                        $countdown++;
                                                                    }

                                                                    $row->count_payments=$countdown;
                                                                    $row->count_sold=$count_sold;
                                                                    $row->count_unsold=$count_unsold;

                                                                            $formatted_created = new \DateTime($row->created);
                                                                            $row->formatted_created = $formatted_created->format('d-m-Y H:i:s');

                                                                            if($row->sold_date)
                                                                            {
                                                                                $formatted_solded = new \DateTime($row->sold_date);
                                                                                $row->formatted_solded = $formatted_solded->format('d-m-Y H:i:s');
                                                                            }
                                                                            else
                                                                            {
                                                                                $row->formatted_solded = null;
                                                                            }

                                                                    return $row;
                                                            });

                                        if($manager_operator_operations)
                                        {
                                            $manager_operator_identity = $this->ManagerOperators->find()
                                                                                                ->contain(['Institutions','People'])
                                                                                                ->where(['ManagerOperators.id'=>$data[2]])
                                                                                                ->first();
                                        
                                            $manager_operator_bars_charts = $this->VisitInvoices->find()
                                                                                                ->select(['total_sum'=>'sum(VisitInvoices.amount)','created_date'=>'DATE_FORMAT(VisitInvoices.created,"%d-%m-%Y")',
                                                                                                    ])
                                                                                                ->where(function($q) use($start_date, $end_date){
                                                                                                    return $q->between('VisitInvoices.created',$start_date,$end_date);
                                                                                                })
                                                                                                ->group(['created_date']);


                                            $footer_element = $manager_operator_identity->institution->fullname.' - '.$manager_operator_identity->institution->institution_quarter.' - '.$manager_operator_identity->institution->institution_quarter_extra;


         
                                            $this->viewBuilder()->options([
                                                    'pdfConfig'=>[
                                                        'filename'=>'Etat Périodique du '.$formatted_start_date->format('d-m-Y').' au '.$formatted_end_date->format('d-m-Y'),
                                                        'margin' => [
                                                            'top' =>0,
                                                            'bottom' => 12.5,
                                                        ]
                                                    ]
                                                ]);
                                            $this->set(compact('manager_operator_bars_charts','manager_operator_identity','manager_operator_operations','formatted_start_date','formatted_end_date'));
                                        }
                                        else
                                        {
                                            echo 'ko';
                                            exit();
                                        }
            }
            else
            {
                $this->Flash->error(__('Vous n\'avez pas le droit d\'accéder à cette route'));
                return $this->redirect($this->referer());

            }
        }
    }


}
