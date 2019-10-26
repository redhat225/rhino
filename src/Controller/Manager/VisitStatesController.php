<?php
namespace App\Controller\Manager;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Event\Event;
/**
 * VisitStates Controller
 *
 * @property \App\Model\Table\VisitStatesTable $VisitStates
 */
class VisitStatesController extends AppController
{

    public function getOrders()
    {
        if($this->request->is('ajax'))
        {
            if($this->request->is('get'))
            {
                $data = $this->request->query;
                $this->loadModel('VisitStates');
                $state = $this->VisitStates->find()
                                            ->where(['VisitStates.visit_id'=>$data['visit-id']])
                                            ->contain(['VisitStateTypes','VisitStateOrderTypes'])
                                            ->map(function($row){
                                                $row->slug = $this->Auth->user('institution.slug');
                                                foreach ($row->visit_state_order_types as $order)
                                                {
                                                    $created_date = new \DateTime($order->_joinData->created);
                                                    $order->formatted_date = $created_date->format('d-m-Y H:i');

                                                    $countdown=0;
                                                    $loop = true;



                                                    while($loop)
                                                    {
                                                
                                                        if(file_exists(WWW_ROOT.'Files'.DS.'manager'.DS.$this->Auth->user('institution.slug').DS.'orders'.DS.$order->_joinData->path_order_details.'-'.$countdown.'.jpg'))
                                                        {
                                                            $countdown++;
                                                        }
                                                        else
                                                        {
                                                            $loop = false;
                                                        }
                                                    }

                                                    $order->count_order = $countdown;


                                                    


                                                }

                                                return $row;
                                            });
                if($state)
                {
                    echo json_encode($state);
                }
                else
                {
                    echo 'ko';
                }
                exit();
            }
        }
    }


    public function generateEndBill()
    {
        if($this->request->is('ajax'))
        {
            if($this->request->is('post'))
            {
                $data = $this->request->data;
                $this->loadModel('Visits');
                $visit = $this->Visits->find()
                                ->contain(['ManagerOperators.Institutions.InstitutionAdresses','Patients.People','VisitStates'=>function($q){
                                   return $q->order(['VisitStates.created'=>'DESC']);
                                },'VisitStates.VisitStateOrderDetails'=>function($q){return $q->order(['VisitStateOrderDetails.created'=>'DESC']);}])
                                ->where(['Visits.id'=>$data['visit_id']])
                                ->first();
                 //update older state
                 $state = $this->VisitStates->get($visit->visit_states[0]->id,['contain'=>['Visits.ManagerOperators']]);
                 if($state->state_end)
                 {
                    echo 'already';
                    exit();
                 }


                 $state->state_end = new \DateTime('NOW');
                if($this->VisitStates->save($state))
                {
                        $data['manager-id']= $this->Auth->user('id');
                        $data['visit'] =$state;
                        $data['patient'] = $visit->patient;

                        switch($state->visit_state_type_id)
                        {
                            case 2:
                                $data['state-operation']= 'surgery_end_file';
                            break;             

                            case 3:
                                $data['state-operation']= 'hospy_file_end';
                            break;

                            case 4:
                                $data['state-operation']= 'meo_end_file';
                            break;

                            case 5:
                                $data['state-operation']= 'reanimation_end_file';

                            break;

                            case 6:
                                $data['state-operation']= 'pregnancy_end_file';
                            break;

                            case 7:
                                $data['state-operation']= 'emergency_end_file';

                            break;

                            case 9:
                                $data['state-operation']= 'trauma_end_file';
                            break;
                        }


                        $this->loadModel('VisitStateOrderDetails');
                        $visit_state_order_detail = $this->VisitStateOrderDetails->newEntity($data);
                        $visit_state_order_detail->visit_state_id = $state->id;

                        if($this->VisitStateOrderDetails->save($visit_state_order_detail))
                        {
                               //generate PDF & Images
                                Configure::write('CakePdf',[
                                                  'engine'=>[
                                                          'className' => 'CakePdf.WkHtmlToPdf',
                                                          'binary' => 'C:\\wkhtmltopdf\\bin\\wkhtmltopdf.exe',
                                                  ],
                                                  'pageSize'=>'A5',
                                                  'orientation' => 'landscape'
                                         ]);
                                $CakePdf = new \CakePdf\Pdf\CakePdf();
                                $CakePdf->template('manager_end_state_file','generator_orders');

                                $close_previous_state_order = json_decode($visit->visit_states[0]->visit_state_order_details[0]->additional_details);
                                          $close_previous_state_order_full = $visit->visit_states[0]->visit_state_order_details[0];
                                          $label_order = $visit_state_order_detail->label;

                                $CakePdf->viewVars(['label_order'=>$label_order,'state'=>$state,'data'=>$data,'institution'=>$this->Auth->user('institution'),'close_previous_state_order'=>$close_previous_state_order,'close_previous_state_order_full'=>$close_previous_state_order_full,'credentials'=>$this->Auth->user('person.people_credential')]);
                                
                                $path = APP.'Files'.DS.'manager'.DS.$this->Auth->user('institution.slug').DS.'orders'.DS.$visit_state_order_detail->path_order_details.'.pdf';
                                
                                $pdf = $CakePdf->output();
                                $pdf = $CakePdf->write($path);

                                if($pdf)
                                {

                                    $path_image =  WWW_ROOT.'Files'.DS.'manager'.DS.$this->Auth->user('institution.slug').DS.'orders'.DS.$visit_state_order_detail->path_order_details.'-%d.jpg';
                                    shell_exec('convert -density 200 '.$path.' '.$path_image);
                                    echo 'ok';
                                }
                                else
                                {
                                    echo 'ko';
                                }
                        }
                        else
                        {
                            echo 'ko';
                        }
                }
                else
                {
                    echo 'ko';
                }



                exit();
            }
        }
    }



}
