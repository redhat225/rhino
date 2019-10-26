<?php
namespace App\Controller\Manager;

use App\Controller\AppController;
use cake\Event\Event;
use Cake\Utility\Security;
/**
 * Patients Controller
 *
 * @property \App\Model\Table\PatientsTable $Patients
 */
class PatientsController extends AppController
{

    public function beforeRender(Event $event)
    {
        parent::beforeRender($event);
        $institution_id = $this->Auth->user('institution_id'); 
        $prefix = $this->Auth->user('prefix');
        $this->viewBuilder()->layout('dashboard');
        $this->set(compact('institution_id','prefix'));  
    }

    public function index()
    {

    }

    public function add()
    {
      if($this->request->is('get'))
      {
      $this->loadModel('Countries');
      $countries = $this->Countries->find()->contain(['CountryCities.CountryTownships'])->toArray();
      $this->set(compact('countries'));
      }

      if($this->request->is('post'))
      {
        $data = $this->request->data;
        $this->loadModel('People');
        $data['state-operation'] = 'registering-patient';

        $patient = $this->People->newEntity($data,['associated'=>['Patients.PatientWorks','Patients.PatientBooks','PeopleSituations','PeopleAttributes','PeopleDescendants','PeopleAdresses','PeopleContacts','PeopleCredentials']]);

        if($this->People->save($patient))
        {
            $this->Flash->success(__('Enregistrement réussi'));
            return $this->redirect(['controller'=>'ManagerOperators','action'=>'general']);
        }
        else
        {
            $this->Flash->error(__('L\'enregistrement du patient a échoué, veuillez réessayer'));
            return $this->redirect(['controller'=>'ManagerOperators','action'=>'general#add-patient']);
        }


      }

    }

    public function manageInsurance()
    {
        if($this->request->is('ajax'))
        {
            if($this->request->is('post'))
            {
                $query = $this->request->data;
                $insurance = $this->Patients->PatientInsurances->get($query['insurance-id']);
               
                switch($query['manage_state'])
                {
                    case 'turn-off':
                        $insurance->state = 0;
                    break;

                    case 'turn-on':
                        $insurance->state = 1;
                    break;

                    case 'drop-off':
                        $insurance->deleted = new \DateTime('NOW');
                    break;

                    case 'drop-in':
                        $insurance->deleted = null;
                    break;

                    case 'renew':
                        $insurance->expired_insurance_date = $query['date_renew_insurance'];
                    break;
                }

                if($this->Patients->PatientInsurances->save($insurance))
                {
                   echo 'ok';
                }
                else
                {
                    echo 'ko';
                }
                exit();
            }

        }
    }

    public function get()
    {
        if($this->request->is('ajax'))
        {
            if($this->request->is('get'))
            {
                $data = $this->request->query;
                $patient_info = $this->Patients->find()
                                                ->contain(['People'])
                                                ->where(['Patients.id'=>$data['id']]);
                if($patient_info)
                {
                    echo json_encode($patient_info);
                }
                else
                {
                    echo 'ko';
                }
            }
            exit();
        }
    }


    public function all()
    {
        if($this->request->is('ajax'))
        {
            if($this->request->is('get'))
            {
                $patient_info = $this->Patients->find()
                                                ->contain(['People.PeopleContacts'])
                                                ->where(['Patients.id <> 0'])
                                                ->map(function($row){

                                                    $dateborn = new \DateTime($row->person->dateborn);
                                                    $row->person->formatted_dateborn = $dateborn->format('Y');

                                                    return $row;
                                                });
                if($patient_info)
                {
                    echo json_encode($patient_info);
                }
                else
                {
                    echo 'ko';
                }
            }
            exit();
        }
    }

    public function searchByNumber()
    {
        $actual_date = new \DateTime('NOW');
        $now = $actual_date->format('Y-m-d');
    	if($this->request->is('ajax'))
    	{
    		$number = $this->request->data['number'];
    		$patient = $this->Patients->find()
    								   ->contain(['People.PeopleDescendants','People.PeopleContacts','People.PeopleAdresses.CountryTownships.CountryCities','Visits','PatientInsurances'=> function($q) use ($now){
                                                return $q->where(['PatientInsurances.state'=>1])
                                                         ->andWhere(['PatientInsurances.expired_insurance_date > '=>$now])
                                                         ->andWhere(function($exp, $q){
                                                        return $exp->isNull('deleted');
                                                 });
                                       },'PatientInsurances.PatientInsurers'])
    									->where(['PeopleContacts.contact1'=>$number,'PeopleContacts.slug'=>'patient'])
    									->orWhere(['PeopleContacts.contact2'=>$number,'PeopleContacts.slug'=>'patient'])
    									->first();
    		if($patient)
    		  echo json_encode($patient);
    		else
    		  echo "ko";

    		 exit(); 
    	}
    }

    public function getAllRoad()
    {
        if($this->request->is('ajax'))
        {
            if($this->request->is('get'))
            {
                $patients = $this->Patients->Visits->find()
                                            ->contain(['ManagerOperators.Institutions'])
                                            ->select(['formated_created'=>'DATE_FORMAT(Visits.created,"%d-%m-%Y %H:%i:%s")'])
                                            ->autoFields(true)
                                            ->where(['Visits.patient_id'=>$this->request->query('id')]);

                if($patients)
                {
                    if($patients->isEmpty())
                    {
                        echo "ko";
                    }
                    else
                    {
                        echo json_encode($patients,JSON_PRETTY_PRINT);
                    }
                }
                else
                {
                    echo "ko";
                }
            }
            exit();
        }
    }


    public function searchSingle()
    {
        if($this->request->is('ajax'))
        {
            if($this->request->is('get'))
            {
                $query_data = $this->request->query;
                $id_people = $query_data['people-id'];

                if(!isset($query_data['date-from']) && !isset($query_data['date-to']))
                {
                    $query_data['date-from']=new \DateTime('NOW - 90 Days');
                    $query_data['date-to']=new \DateTime('NOW');
                }

                if(!isset($query_data['min']) && !isset($query_data['max']))
                {
                    $query_data['min']=0;
                    $query_data['max']=1000000000000000000000000000;
                }



                $this->loadModel('People');
                $this->loadModel('VisitSpecialities');
                $patient = $this->People->find()->contain(['PeopleContacts','PeopleAdresses.CountryTownships.CountryCities.Countries','PeopleDescendants','PeopleAttributes','PeopleSituations','Patients.PatientInsurances' => function($q){return $q->where(['PatientInsurances.institution_id'=>$this->Auth->user('id')]);},'Patients.PatientInsurances.PatientInsurers','Patients.Visits'=>function($q) use ($query_data) {
                    return $q->where(function($exp, $q) use ($query_data){
                        return $exp->between('Visits.created',$query_data['date-from'],$query_data['date-to']);
                    })->order(['Visits.created'=>'DESC']);
                },'Patients.Visits.VisitInvoices'=> function($q) use($query_data){
                    return $q->where(function($exp, $q) use($query_data){
                        return $exp->between('VisitInvoices.amount',$query_data['min'],$query_data['max']);
                    });
                },'Patients.Visits.VisitInvoices.VisitInvoicePayments','Patients.Visits.ManagerOperators.People','Patients.Visits.VisitInvoices.ManagerOperators.People','Patients.Visits.VisitInvoices.ManagerOperators.Institutions','Patients.Visits.VisitStates'=>function($q){ return $q->order(['VisitStates.created'=>'DESC']);},'Patients.Visits.VisitInterventionDoctors','Patients.Visits.VisitInterventionDoctors.PatientBookings'])->where(['People.id'=>$id_people])->first();

                if($patient)
                {   
                    //formatting dates and other stuff
                    foreach($patient->patient->visits as $visit)
                    {
                        foreach ($visit->visit_states as $state){

                            $formatted_created_state = new \DateTime($state->state_begin);
                            $state['formatted_created_state']= $formatted_created_state->format('d-m-Y H:i:s');

                            if($state->state_end)
                            {
                                $formatted_end_state = new \DateTime($state->state_end);
                                $state['formatted_end_state']= $formatted_end_state->format('d-m-Y H:i:s');
                            }
                            else
                                $state['formatted_end_state']= null;

                        }


                        foreach($visit->visit_invoices as $invoice)
                        {
                            $invoice['amount'] = number_format($invoice->amount,2,',','.');

                            $formatted_created = new \DateTime($invoice->created);
                            $invoice['formatted_created']= $formatted_created->format('d-m-Y H:i:s');

                            if($invoice->sold_date)
                            {
                                $formatted_solded = new \DateTime($invoice->sold_date);
                                $invoice['formatted_solded']= $formatted_solded->format('d-m-Y H:i:s');
                            }
                            else
                                $invoice['formatted_solded']= null;


                                //building image_src invoice
                                $countdown = 0;
                                $search = true;

                                while($search) 
                                {
                                    if(file_exists(WWW_ROOT."Files/manager/".$invoice->manager_operator->institution->slug."/invoices_images/".$invoice->code_invoice.'-'.$countdown.'.jpg'))
                                    {
                                        $countdown++;
                                    }
                                    else
                                    {
                                        $search = false;
                                        $invoice->bill_image_count = $countdown;
                                    }
                                    
                                }
                        }


                        foreach ($visit->visit_intervention_doctors as $intervention) {
                            $expected_meeting_date = new \DateTime($intervention->expected_meeting_date);
                            $intervention['expected_meeting_date'] = $expected_meeting_date->format('d-m-Y H:i:s');

                            if($intervention->patient_booking)
                            {   
                                $speciality = $this->VisitSpecialities->find()
                                                                      ->where(['id'=>$intervention->patient_booking->visit_speciality_id])
                                                                      ->first();

                                if($intervention->patient_booking->doctor_id)
                                {
                                  $doctor = $this->People->find()->contain(['Doctors'])
                                                                ->where(['Doctors.id'=>$intervention->patient_booking->doctor_id])
                                                                ->first();
                                    $intervention->patient_booking['fullname_doctor']= $doctor->lastname.' '.$doctor->firstname;
                                }

                                $intervention->patient_booking['speciality_label'] = $speciality->libelle;
                            }
                        }
                        
                    }
                    echo json_encode($patient);
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
