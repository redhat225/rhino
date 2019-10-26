<?php
namespace App\Controller\Manager;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Core\Configure;
/**
 * VisitOrderTypes Controller
 *
 * @property \App\Model\Table\VisitOrderTypesTable $VisitOrderTypes
 */
class VisitsController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->viewBuilder()->layout('dashboard');
        $this->loadModel('VisitActs');
    }

    public function add()
    {
    	if($this->request->is('post'))
    	{
    		$data = $this->request->data;
    		$visit = $this->Visits->newEntity($data,['associated'=>['VisitActs._joinData']]);
    		$visit->manager_operator_id = $this->Auth->user('id');

    		if($this->Visits->save($visit))
    		{
    				$this->Flash->success(__('Visite Enregistrée avec succes sous le numéro'.$visit->code_visit));
    				return $this->redirect(['controller'=>'ManagerOperators','action'=>'general']);
    		}
    		else
    		{
    			$this->Flash->error(__("Une Erreur s'est produite lors de l'opération veuillez réessayer"));
    		}
    	}

    	$visit_types = $this->Visits->VisitTypes->find();
    	$visit_kind_transports = $this->Visits->VisitKindTransports->find();
    	$visit_levels = $this->Visits->VisitLevels->find();
    	$visit_specialities = $this->Visits->VisitSpecialities->find();
    	$this->set(compact('visit_types','visit_kind_transports','visit_levels','visit_specialities'));
    }

    public function getInterventions()
    {
        if($this->request->is('ajax'))
        {
                if($this->request->is('get'))
                {
                    $query_data = $this->request->query;
                    $interventions = $this->Visits->find('interventions',['visit-id'=>$query_data['visit-id']])
                                    ->map(function($row){
                                        foreach ($row->visit_intervention_doctors as $intervention) {
                                            if($intervention->deleted)
                                            {
                                                $date_deleted  = new \DateTime($row->deleted);
                                                $intervention->formatted_deleted  = $date_deleted->format('d-m-Y H:i:s');
                                            }
                                        }

                                            return $row;
                                    });

                    if($interventions)
                    {
                        echo json_encode($interventions);
                    }
                    else
                    {
                        echo 'ko';
                    }

                    exit();
                }   
        }
    }

    public function addAct()
    {
    	if($this->request->is('ajax'))
    	{
    		$acts = $this->VisitActs->find();
    		$this->set(compact('acts'));
    		$this->viewBuilder()->layout('blank');
    	}
    }

    public function all()
    {
        if($this->request->is('ajax'))
        {
            if($this->request->is('get'))
            {
                $query = $this->request->query;
                $visits = $this->Visits->find()
                                        ->where(['Visits.patient_id'=>$query['id']]);
                if($visits->isEmpty())
                {
                    echo "ok";
                }
                else
                {
                    echo json_encode($visits);
                }
                exit();
            }
        }
    }

    public function generateState()
    {
        if($this->request->is('ajax'))
        {
            if($this->request->is('post'))
            {
              $data = $this->request->data;
              $visit = $this->Visits->find()
                                ->contain(['ManagerOperators.Institutions.InstitutionAdresses'=>function($q){return $q->where(['InstitutionAdresses.institution_id'=>$this->Auth->user('institution_id')]);},'Patients.People.PeopleContacts','Patients.People.PeopleAdresses.CountryTownships.CountryCities.Countries','VisitStates'=>function($q){
                                   return $q->order(['VisitStates.created'=>'DESC']);
                                },'VisitStates.VisitStateOrderDetails'=>function($q){return $q->order(['VisitStateOrderDetails.created'=>'DESC']);}])
                                ->where(['Visits.id'=>$data['visit_id']])
                                ->first();

              $this->loadModel('VisitStates');
              //update older state
              $state = $this->VisitStates->get($visit->visit_states[0]->id,['contain'=>['Visits.ManagerOperators']]);
              $state->state_end = new \DateTime('NOW');

              if($this->VisitStates->save($state))
              {
                        // //create new state details
                        $data_older = [];
                        $data_older['manager-id'] = $this->Auth->user('id');
                        $data_older['hospy_motif'] = $data['hospy_motif'];
                      
                        if($visit->visit_states[0]->visit_state_order_details)
                        {
                           $data_older['state-operation'] = $this->determineKindOrder($visit->visit_states[0]->visit_state_order_details[0]->visit_state_order_type_id);
                        }
                        else
                          $data_older['state-operation'] = false;

                        if($data_older['state-operation']!==false)
                        {
                            $data_older['patient'] = $visit->patient;
                            $this->loadModel('VisitStateOrderDetails');
                            $state_order_detail = $this->VisitStateOrderDetails->newEntity($data_older);
                            $state_order_detail->visit_state_id = $state->id;
                            $label_order = $state_order_detail->label;
                            $this->VisitStateOrderDetails->save($state_order_detail);
                                                                //config Pdf
                                    Configure::write('CakePdf',[
                                          'engine'=>[
                                                  'className' => 'CakePdf.WkHtmlToPdf',
                                                  'binary' => 'C:\\wkhtmltopdf\\bin\\wkhtmltopdf.exe',
                                          ],
                                          'pageSize'=>'A5',
                                          'orientation' => 'landscape'
                                 ]);

                                  $CakePdf_older = new \CakePdf\Pdf\CakePdf();
                                  $CakePdf_older->template('manager_end_state_file','generator_orders');
                                  $close_previous_state_order = json_decode($visit->visit_states[0]->visit_state_order_details[0]->additional_details);
                                  $close_previous_state_order_full = $visit->visit_states[0]->visit_state_order_details[0];

                                  $CakePdf_older->viewVars(['label_order'=>$label_order,'state'=>$state,'data'=>$data_older,'institution'=>$this->Auth->user('institution'),'close_previous_state_order'=>$close_previous_state_order,'close_previous_state_order_full'=>$close_previous_state_order_full,'credentials'=>$this->Auth->user('person.people_credential')]);

                                  $path = APP.'Files'.DS.'manager'.DS.$this->Auth->user('institution.slug').DS.'orders'.DS.$state_order_detail->path_order_details.'.pdf';

                                  $pdf_older = $CakePdf_older->output();
                                  $pdf_older = $CakePdf_older->write($path);

                                  $path_image =  WWW_ROOT.'Files'.DS.'manager'.DS.$this->Auth->user('institution.slug').DS.'orders'.DS.$state_order_detail->path_order_details.'-%d.jpg';
                                  
                                  shell_exec('convert -density 200 '.$path.' '.$path_image);
                        }

                                    Configure::write('CakePdf',[
                                                            'engine'=>[
                                                                    'className' => 'CakePdf.WkHtmlToPdf',
                                                                    'binary' => 'C:\\wkhtmltopdf\\bin\\wkhtmltopdf.exe',
                                                            ],
                                                            'pageSize'=>'A5',
                                                            'orientation' => 'portrait',
                                                            'margin' => [
                                                                  'top' => 5,
                                                                  'right' => 5,
                                                                  'left' => 5,
                                                                  'bottom' => 5,

                                                            ]
                                                   ]);
                                        //flushing data ofr schedule generator
                                        $data['institution_id'] = $this->Auth->user('institution_id');
                                        $data['code_visit'] = $visit->code_visit;
                                        $data['patient_id'] = $visit->patient_id;

                                        switch($data['visit_state_operation'])
                                        {
                                          case 'hospitalisation':

                                                    $CakePdf = new \CakePdf\Pdf\CakePdf();
                                              //create a new state
                                                   $data['state-operation'] = 'hospy_file';
                                                   $data['manager-id'] = $this->Auth->user('id');
                                                   $new_state = $this->VisitStates->newEntity($data,['associated'=>'VisitStateOrderTypes']);

                                                   if($this->VisitStates->save($new_state))
                                                   {
                                                      $CakePdf->template('manager_order_file_format', 'generator_orders');
                                                      $CakePdf->viewVars(['visit'=>$visit,'data'=>$data,'credentials'=>$this->Auth->user('person.people_credential')]);
                                                      $pdf = $CakePdf->output();                  

                                                      $pdf = $CakePdf->write(APP.'Files'.DS.'manager'.DS.$this->Auth->user('institution.slug').DS.'orders'.DS.$new_state->visit_state_order_types[0]->_joinData->path_order_details.'.pdf');
                                                      
                                                    if($pdf)
                                                    {
                                                      $path = APP.'Files'.DS.'manager'.DS.$this->Auth->user('institution.slug').DS.'orders'.DS.$new_state->visit_state_order_types[0]->_joinData->path_order_details.'.pdf';
                                                      $path_image =  WWW_ROOT.'Files'.DS.'manager'.DS.$this->Auth->user('institution.slug').DS.'orders'.DS.$new_state->visit_state_order_types[0]->_joinData->path_order_details.'-%d.jpg';

                                                      shell_exec('convert -density 250 '.$path.' '.$path_image);
                                                      
                                                      echo 'ok';
                                                    }
                                                    else
                                                    {
                                                     echo 'ko';
                                                    } 
                                                  }
                                                  else
                                                    echo'ko';
                                          break;

                                          case 'meo':
                                                    $CakePdf = new \CakePdf\Pdf\CakePdf();
                                              //create a new state
                                                   $data['state-operation'] = 'meo_file';
                                                   $data['manager-id'] = $this->Auth->user('id');
                                                   $new_state = $this->VisitStates->newEntity($data,['associated'=>'VisitStateOrderTypes']);

                                                   if($this->VisitStates->save($new_state))
                                                   {
                                                      $CakePdf->template('manager_order_file_format', 'generator_orders');
                                                      $CakePdf->viewVars(['visit'=>$visit,'data'=>$data,'credentials'=>$this->Auth->user('person.people_credential')]);
                                                      $pdf = $CakePdf->output();                  

                                                      $pdf = $CakePdf->write(APP.'Files'.DS.'manager'.DS.$this->Auth->user('institution.slug').DS.'orders'.DS.$new_state->visit_state_order_types[0]->_joinData->path_order_details.'.pdf');
                                                      
                                                    if($pdf)
                                                    {
                                                      $path = APP.'Files'.DS.'manager'.DS.$this->Auth->user('institution.slug').DS.'orders'.DS.$new_state->visit_state_order_types[0]->_joinData->path_order_details.'.pdf';
                                                      $path_image =  WWW_ROOT.'Files'.DS.'manager'.DS.$this->Auth->user('institution.slug').DS.'orders'.DS.$new_state->visit_state_order_types[0]->_joinData->path_order_details.'-%d.jpg';

                                                      shell_exec('convert -density 250 '.$path.' '.$path_image);
                                                      
                                                      echo 'ok';
                                                    }
                                                    else
                                                    {
                                                     echo 'ko';
                                                    } 
                                                  }
                                                  else
                                                    echo'ko';
                                          break;

                                          case 'chirurgie':
                                                    $CakePdf = new \CakePdf\Pdf\CakePdf();
                                              //create a new state
                                                   $data['state-operation'] = 'surgery_file';
                                                   $data['manager-id'] = $this->Auth->user('id');
                                                   $new_state = $this->VisitStates->newEntity($data,['associated'=>'VisitStateOrderTypes']);

                                                   if($this->VisitStates->save($new_state))
                                                   {
                                                      $CakePdf->template('manager_order_file_format', 'generator_orders');
                                                      $CakePdf->viewVars(['visit'=>$visit,'data'=>$data,'credentials'=>$this->Auth->user('person.people_credential')]);
                                                      $pdf = $CakePdf->output();                  

                                                      $pdf = $CakePdf->write(APP.'Files'.DS.'manager'.DS.$this->Auth->user('institution.slug').DS.'orders'.DS.$new_state->visit_state_order_types[0]->_joinData->path_order_details.'.pdf');
                                                      
                                                    if($pdf)
                                                    {
                                                      $path = APP.'Files'.DS.'manager'.DS.$this->Auth->user('institution.slug').DS.'orders'.DS.$new_state->visit_state_order_types[0]->_joinData->path_order_details.'.pdf';
                                                      $path_image =  WWW_ROOT.'Files'.DS.'manager'.DS.$this->Auth->user('institution.slug').DS.'orders'.DS.$new_state->visit_state_order_types[0]->_joinData->path_order_details.'-%d.jpg';

                                                      shell_exec('convert -density 250 '.$path.' '.$path_image);
                                                      
                                                      echo 'ok';
                                                    }
                                                    else
                                                    {
                                                     echo 'ko';
                                                    } 
                                                  }
                                                  else
                                                    echo'ko';
                                          break;

                                          case 'reanimation':
                                                    $CakePdf = new \CakePdf\Pdf\CakePdf();
                                              //create a new state
                                                   $data['state-operation'] = 'reanimation_file';
                                                   $data['manager-id'] = $this->Auth->user('id');
                                                   $new_state = $this->VisitStates->newEntity($data,['associated'=>'VisitStateOrderTypes']);

                                                   if($this->VisitStates->save($new_state))
                                                   {
                                                      $CakePdf->template('manager_order_file_format', 'generator_orders');
                                                      $CakePdf->viewVars(['visit'=>$visit,'data'=>$data,'credentials'=>$this->Auth->user('person.people_credential')]);
                                                      $pdf = $CakePdf->output();                  

                                                      $pdf = $CakePdf->write(APP.'Files'.DS.'manager'.DS.$this->Auth->user('institution.slug').DS.'orders'.DS.$new_state->visit_state_order_types[0]->_joinData->path_order_details.'.pdf');
                                                      
                                                    if($pdf)
                                                    {
                                                      $path = APP.'Files'.DS.'manager'.DS.$this->Auth->user('institution.slug').DS.'orders'.DS.$new_state->visit_state_order_types[0]->_joinData->path_order_details.'.pdf';
                                                      $path_image =  WWW_ROOT.'Files'.DS.'manager'.DS.$this->Auth->user('institution.slug').DS.'orders'.DS.$new_state->visit_state_order_types[0]->_joinData->path_order_details.'-%d.jpg';

                                                      shell_exec('convert -density 250 '.$path.' '.$path_image);
                                                      
                                                      echo 'ok';
                                                    }
                                                    else
                                                    {
                                                     echo 'ko';
                                                    } 
                                                  }
                                                  else
                                                    echo'ko';
                                          break;

                                          case 'pregnancy':
                                                    $CakePdf = new \CakePdf\Pdf\CakePdf();
                                              //create a new state
                                                   $data['state-operation'] = 'pregnancy_file';
                                                   $data['manager-id'] = $this->Auth->user('id');
                                                   $new_state = $this->VisitStates->newEntity($data,['associated'=>'VisitStateOrderTypes']);

                                                   if($this->VisitStates->save($new_state))
                                                   {
                                                      $CakePdf->template('manager_order_file_format', 'generator_orders');
                                                      $CakePdf->viewVars(['visit'=>$visit,'data'=>$data,'credentials'=>$this->Auth->user('person.people_credential')]);
                                                      $pdf = $CakePdf->output();                  

                                                      $pdf = $CakePdf->write(APP.'Files'.DS.'manager'.DS.$this->Auth->user('institution.slug').DS.'orders'.DS.$new_state->visit_state_order_types[0]->_joinData->path_order_details.'.pdf');
                                                      
                                                    if($pdf)
                                                    {
                                                      $path = APP.'Files'.DS.'manager'.DS.$this->Auth->user('institution.slug').DS.'orders'.DS.$new_state->visit_state_order_types[0]->_joinData->path_order_details.'.pdf';
                                                      $path_image =  WWW_ROOT.'Files'.DS.'manager'.DS.$this->Auth->user('institution.slug').DS.'orders'.DS.$new_state->visit_state_order_types[0]->_joinData->path_order_details.'-%d.jpg';

                                                      shell_exec('convert -density 250 '.$path.' '.$path_image);
                                                      
                                                      echo 'ok';
                                                    }
                                                    else
                                                    {
                                                     echo 'ko';
                                                    } 
                                                  }
                                                  else
                                                    echo'ko';
                                          break;

                                          case 'traumatologie':
                                                    $CakePdf = new \CakePdf\Pdf\CakePdf();
                                              //create a new state
                                                   $data['state-operation'] = 'trauma_file';
                                                   $data['manager-id'] = $this->Auth->user('id');
                                                   $new_state = $this->VisitStates->newEntity($data,['associated'=>'VisitStateOrderTypes']);

                                                   if($this->VisitStates->save($new_state))
                                                   {
                                                      $CakePdf->template('manager_order_file_format', 'generator_orders');
                                                      $CakePdf->viewVars(['visit'=>$visit,'data'=>$data,'credentials'=>$this->Auth->user('person.people_credential')]);
                                                      $pdf = $CakePdf->output();                  

                                                      $pdf = $CakePdf->write(APP.'Files'.DS.'manager'.DS.$this->Auth->user('institution.slug').DS.'orders'.DS.$new_state->visit_state_order_types[0]->_joinData->path_order_details.'.pdf');
                                                      
                                                    if($pdf)
                                                    {
                                                      $path = APP.'Files'.DS.'manager'.DS.$this->Auth->user('institution.slug').DS.'orders'.DS.$new_state->visit_state_order_types[0]->_joinData->path_order_details.'.pdf';
                                                      $path_image =  WWW_ROOT.'Files'.DS.'manager'.DS.$this->Auth->user('institution.slug').DS.'orders'.DS.$new_state->visit_state_order_types[0]->_joinData->path_order_details.'-%d.jpg';

                                                      shell_exec('convert -density 250 '.$path.' '.$path_image);
                                                      
                                                      echo 'ok';
                                                    }
                                                    else
                                                    {
                                                     echo 'ko';
                                                    } 
                                                  }
                                                  else
                                                    echo'ko';
                                          break;
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


    private function determineKindOrder($order_id)
    {
      switch($order_id)
      {
          case 1:
            $next_operation = 'hospy_file_end';
          break;   


          case 2:
            $next_operation = 'emergency_end_file';
          break;


          case 5:
            $next_operation = 'reanimation_end_file';

          break;

          case 7:
              $next_operation = 'pregnancy_end_file';
          break;

          case 9:
              $next_operation = 'meo_end_file';
          break;

          case 11:
              $next_operation = 'trauma_end_file';
          break;

          case 13:
             $next_operation = 'surgery_end_file';
          break;

          default:
            $next_operation = false;
          break;

      }

        return $next_operation;

    }


    public function changeState()
    {
      if($this->request->is('ajax'))
      {
        if($this->request->is('post'))
        {
          $data = $this->request->data;

          $visit = $this->Visits->find()
                                ->contain(['ManagerOperators.Institutions'=>function($q){return $q->where(['Institutions.id'=>$this->Auth->user('institution_id')]);},'ManagerOperators.Institutions.InstitutionAdresses','Patients.People.PeopleContacts','Patients.People.PeopleAdresses.CountryTownships.CountryCities.Countries','VisitStates'=>function($q){
                                   return $q->order(['VisitStates.created'=>'DESC']);
                                }])
                                ->where(['Visits.id'=>$data['visit-id']])
                                ->first();

          if($visit===null)
          {
            echo 'unauthorized';
            exit();
          }
          
          $state = $data['state'];

          if($visit->visit_states[0]->visit_state_type_id==$state)
          {
            echo 'ko';
            exit();
          }
          else
          {
            switch($state)
            {
              case 2:
                $label = 'Billet Entrée Chirurgie';
                $label_hidden = 'chirurgie';
              break;

              case 3:
                $label = 'Billet Entrée Hospitalisation';
                $label_hidden = 'hospitalisation';

              break;

              case 4:
                $label = 'Billet Entrée MEO';
                $label_hidden = 'meo';

              break;

              case 5:
                $label = 'Billet Entrée Réanimation';
                $label_hidden = 'reanimation';

              break;

              case 6:
                $label = 'Billet Entrée Maternité';
                $label_hidden = 'pregnancy';

              break;

              case 9:
                $label = 'Billet Entrée Traumatologie';
                $label_hidden = 'traumatologie';
              break;

              default:
                echo 'ko';
                exit();
              break;
            }
                $this->set(compact('label','visit','state','label_hidden'));
                $this->render('order_floating_generator');
          }

          
        }
      }
    }

    public function reattributeVisit()
    {
        if($this->request->is('ajax'))
        {
            if($this->request->is('post'))
            {
              $data = $this->request->data;
              $visit = $this->Visits->get($data['visit-id']);
              $visit->patient_id = $data['patient-id'];

              if($this->Visits->save($visit))
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
                $query_data = $this->request->query;

                if(isset($query_data['specific-search']))
                {
                  switch($query_data['specific-search'])
                  {
                    case 'date':
                          $visits = $this->Visits->find('entireByDate',['date-from'=>$query_data['date-from'],'date-to'=>$query_data['date-to']]);
                    break; 
                  }
   
                }
                else
                {
                  $visits = $this->Visits->find('entire');
                }

                if($visits)     
                {
                    echo json_encode($visits);
                }
                else
                    echo 'ko';

                exit();
            }
        }
    }


        //cancel booking

    public function cancelBooking()
    {
      if($this->request->is('ajax'))
      {
        if($this->request->is('post'))
        { 
              $data = $this->request->data;
              $visit = $this->Visits->get($data['id'],['contain'=>['VisitInterventionDoctors.PatientBookings','VisitStates']]);
              $visit->visit_intervention_doctors[0]->deleted = new \DateTime();
              $visit->visit_intervention_doctors[0]->patient_booking->deleted = new \DateTime();
              $visit->visit_states[0]->state_end = new \DateTime();
              $visit->deleted = new \DateTime();

              $visit->dirty('deleted',true);
              $visit->dirty('visit_intervention_doctors',true);
              $visit->dirty('visit_states',true);
              // debug($visit);
              // die();
              if($this->Visits->save($visit))
              {
                $this->loadModel('PatientBookings');
                $patient_booking = $this->PatientBookings->get($visit->visit_intervention_doctors[0]->patient_booking->id);
                $patient_booking->deleted = new \DateTime();
                $patient_booking->state = 3;
                if($this->PatientBookings->save($patient_booking))
                {
                    $formatted_deleted = $visit->deleted->format('d-m-Y H:i:s');
                    $response = Array('ok',$formatted_deleted);
                    echo json_encode($response);
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

    public function revalidateBooking()
    {
      if($this->request->is('ajax'))
      {
        if($this->request->is('post'))
        { 
              $data = $this->request->data;
              $visit = $this->Visits->get($data['id'],['contain'=>['VisitInterventionDoctors.PatientBookings','VisitStates']]);
              $visit->visit_intervention_doctors[0]->deleted = null;
              $visit->visit_intervention_doctors[0]->patient_booking->deleted = null;
              $visit->visit_states[0]->state_end = null;
              $visit->deleted =null;

              $visit->dirty('deleted',true);
              $visit->dirty('visit_intervention_doctors',true);
              $visit->dirty('visit_states',true);
              // debug($visit);
              // die();
              if($this->Visits->save($visit))
              {
                $this->loadModel('PatientBookings');
                $patient_booking = $this->PatientBookings->get($visit->visit_intervention_doctors[0]->patient_booking->id);
                $patient_booking->deleted = null;
                $patient_booking->state = 1;
                if($this->PatientBookings->save($patient_booking))
                {
                    echo 'ok';
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

    public function updateValidateBooking(){

      if($this->request->is('ajax'))
      {
        if($this->request->is('post'))
        { 
              $data = $this->request->data;


              $visit = $this->Visits->get($data['id'],['contain'=>['VisitInterventionDoctors.PatientBookings']]);

              if($data['doctor_id']!='0')
              {
                $visit->visit_intervention_doctors[0]->doctor_id = $data['doctor_id'];
                $visit->visit_speciality_id = $data['speciality_id'];
              }
              else
              {
                $visit->visit_speciality_id = $data['speciality_id'];
                $visit->visit_intervention_doctors[0]->doctor_id = null;
              }

              $table = explode('-',$visit->code_visit);
              $table[2]=$data['speciality_tag'];
              $visit->code_visit=implode('-', $table);


              $visit->dirty('visit_intervention_doctors',true);

              if($this->Visits->save($visit))
              {
                $this->loadModel('PatientBookings');
                $patient_booking = $this->PatientBookings->get($visit->visit_intervention_doctors[0]->patient_booking->id);
                if($data['doctor_id']!='0')
                {
                  $patient_booking->doctor_id = $data['doctor_id'];
                  $patient_booking->visit_speciality_id = $data['speciality_id'];
                }
                else
                {
                  $patient_booking->doctor_id = null;
                  $patient_booking->visit_speciality_id = $data['speciality_id'];
                }


                if($this->PatientBookings->save($patient_booking))
                {
                    echo 'ok';
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

    //replan visit/booking
    public function replanVisit()
    {
        if($this->request->is('ajax'))
        {
            if($this->request->is('post'))
            {
                $data = $this->request->data;
                $visit = $this->Visits->get($data['id'],['contain'=>'VisitInterventionDoctors']);
                $new_date = $data['date'].' '.$data['time'].':00' ;
                $visit->visit_intervention_doctors[0]->expected_meeting_date = $new_date;
                $visit->dirty('visit_intervention_doctors',true);

                if($this->Visits->save($visit))
                {
                    $response = Array('ok',$new_date);
                    echo json_encode($response);
                }
                else
                {
                    echo 'ko';
                }

                exit();
            }
        }
    }

    //generate stats
    public function generateStatsSingleVisit()
    {
      if($this->request->is('ajax'))
      {
        if($this->request->is('get'))
        { 
          $query_data = $this->request->query;
          $visit_info = $this->Visits->find()
                                    ->contain(['VisitInvoices'=>function($q){return $q->order(['VisitInvoices.created'=>'DESC']);},'VisitInvoices.VisitInvoicePayments.VisitInvoicePaymentSchedules','Patients.People','VisitStates'=>function($q){return $q->order(['VisitStates.created'=>'DESC']); },'VisitInvoices.ManagerOperators.People','VisitStates.VisitStateTypes','VisitStates.VisitKindTransports','VisitStates.VisitLevels'])
                                    ->where(['Visits.id'=>$query_data['visit_id']])
                                    ->map(function($row){


                                                                        $countdown_payment = 0;
                                                                        $count_sold_payment = 0;
                                                                        $count_unsold_payment = 0;
                                                                        $sum_sold_payment = 0;
                                                                        $sum_unsold_payment = 0;

                                                                        $countdown_invoice_recovered=0;
                                                                        $countdown_invoice_unrecovered=0;

                                                                    foreach ($row->visit_invoices as $invoice) 
                                                                    {
                                                                      $count_payments = 0;
                                                                      $count_sold_payment_single = 0;
                                                                      $count_unsold_payment_single = 0;
                                                                        if($invoice->visit_invoice_payment_way_id!==0)
                                                                        {
                                                                          foreach ($invoice->visit_invoice_payments as $payment)
                                                                          {
                                                                            if($payment->state==1)
                                                                            {
                                                                                $count_sold_payment++;
                                                                                $count_sold_payment_single++;
                                                                                $sum_sold_payment+=$payment->amount;
                                                                            }
                                                                            else
                                                                            {
                                                                                $count_unsold_payment++;
                                                                                $count_unsold_payment_single++;
                                                                                $sum_unsold_payment+=$payment->amount;
                                                                            }
                                                                            $count_payments++;
                                                                            $countdown_payment++;
                                                                          }
                                                                        }
                                                                        else
                                                                        {
                                                                          $sum_unsold_payment+=$invoice->amount;
                                                                        }
                                                                        $invoice->count_payments = $count_payments;
                                                                        $invoice->count_sold_payment_single = $count_sold_payment_single;
                                                                        $invoice->count_unsold_payment_single = $count_unsold_payment_single;


                                                                                $formatted_created = new \DateTime($invoice->created);
                                                                                $invoice->formatted_created = $formatted_created->format('d-m-Y H:i:s');

                                                                                if($invoice->sold_date)
                                                                                {
                                                                                    $formatted_solded = new \DateTime($invoice->sold_date);
                                                                                    $invoice->formatted_solded = $formatted_solded->format('d-m-Y H:i:s');
                                                                                }
                                                                                else
                                                                                {
                                                                                    $invoice->formatted_solded = null;
                                                                                }


                                                                                if($invoice->state!=0)
                                                                                {
                                                                                  $countdown_invoice_recovered ++;   
                                                                                }
                                                                                else
                                                                                {
                                                                                  $countdown_invoice_unrecovered ++; 
                                                                                }

                                                                    }


                                                                    $row->count_payments=$countdown_payment;
                                                                    $row->count_sold_payment=$count_sold_payment;
                                                                    $row->count_unsold_payment=$count_unsold_payment;

                                                                    $row->sum_sold_payment =  $sum_sold_payment;
                                                                    $row->sum_unsold_payment =  $sum_unsold_payment;
                                                                    $row->countdown_invoice_recovered = $countdown_invoice_recovered;
                                                                    $row->countdown_invoice_unrecovered = $countdown_invoice_unrecovered;

                                                                    return $row;
                                                            });

                                                            if($visit_info)
                                                            {
                                                              $visit_info = $visit_info->toArray()[0];

                                                              $visit_info_additional = $this->Visits->VisitInvoices->find()
                                                                ->select(['count_invoice'=>'count(VisitInvoices.id)','sum_invoices'=>'sum(VisitInvoices.amount)','max_amount_invoice'=>'max(VisitInvoices.amount)','min_amount_invoice'=>'min(VisitInvoices.amount)'])
                                                                ->where(['VisitInvoices.visit_id'=>$query_data['visit_id']])
                                                                ->first();
                                                              $pdf_view_url = '/manager/visits/generate-stats-single-visit/'.$visit_info->id.'.pdf';
                                                              $this->set(compact('visit_info','visit_info_additional','pdf_view_url'));
                                                            }
                                                            else
                                                            {
                                                              echo 'ko';
                                                              exit();
                                                            }

        }
      }
      else
      {
            if($this->request->params['_ext']==='pdf')
            {
              $visit_id = $this->request->params['pass'][0];
                            $visit_info = $this->Visits->find()
                                              ->contain(['VisitInvoices'=>function($q){return $q->order(['VisitInvoices.created'=>'DESC']);},'VisitInvoices.VisitInvoicePayments.VisitInvoicePaymentSchedules','Patients.People','VisitStates'=>function($q){return $q->order(['VisitStates.created'=>'DESC']); },'VisitInvoices.ManagerOperators.People','VisitStates.VisitStateTypes','VisitStates.VisitKindTransports','VisitStates.VisitLevels'])
                                              ->where(['Visits.id'=>$visit_id])
                                              ->map(function($row){
                                                                        $countdown_payment = 0;
                                                                        $count_sold_payment = 0;
                                                                        $count_unsold_payment = 0;
                                                                        $sum_sold_payment = 0;
                                                                        $sum_unsold_payment = 0;

                                                                        $countdown_invoice_recovered=0;
                                                                        $countdown_invoice_unrecovered=0;

                                                                    foreach ($row->visit_invoices as $invoice) 
                                                                    {
                                                                      $count_payments = 0;
                                                                      $count_sold_payment_single = 0;
                                                                      $count_unsold_payment_single = 0;
                                                                        if($invoice->visit_invoice_payment_way_id!==0)
                                                                        {
                                                                          foreach ($invoice->visit_invoice_payments as $payment)
                                                                          {
                                                                            if($payment->state==1)
                                                                            {
                                                                                $count_sold_payment++;
                                                                                $count_sold_payment_single++;
                                                                                $sum_sold_payment+=$payment->amount;
                                                                            }
                                                                            else
                                                                            {
                                                                                $count_unsold_payment++;
                                                                                $count_unsold_payment_single++;
                                                                                $sum_unsold_payment+=$payment->amount;
                                                                            }
                                                                            $count_payments++;
                                                                            $countdown_payment++;
                                                                          }
                                                                        }
                                                                        else
                                                                        {
                                                                          $sum_unsold_payment+=$invoice->amount;
                                                                        }
                                                                        $invoice->count_payments = $count_payments;
                                                                        $invoice->count_sold_payment_single = $count_sold_payment_single;
                                                                        $invoice->count_unsold_payment_single = $count_unsold_payment_single;


                                                                                $formatted_created = new \DateTime($invoice->created);
                                                                                $invoice->formatted_created = $formatted_created->format('d-m-Y H:i:s');

                                                                                if($invoice->sold_date)
                                                                                {
                                                                                    $formatted_solded = new \DateTime($invoice->sold_date);
                                                                                    $invoice->formatted_solded = $formatted_solded->format('d-m-Y H:i:s');
                                                                                }
                                                                                else
                                                                                {
                                                                                    $invoice->formatted_solded = null;
                                                                                }


                                                                                if($invoice->state!=0)
                                                                                {
                                                                                  $countdown_invoice_recovered ++;   
                                                                                }
                                                                                else
                                                                                {
                                                                                  $countdown_invoice_unrecovered ++; 
                                                                                }

                                                                    }


                                                                    $row->count_payments=$countdown_payment;
                                                                    $row->count_sold_payment=$count_sold_payment;
                                                                    $row->count_unsold_payment=$count_unsold_payment;

                                                                    $row->sum_sold_payment =  $sum_sold_payment;
                                                                    $row->sum_unsold_payment =  $sum_unsold_payment;
                                                                    $row->countdown_invoice_recovered = $countdown_invoice_recovered;
                                                                    $row->countdown_invoice_unrecovered = $countdown_invoice_unrecovered;

                                                                    return $row;
                                                            });

                                                            if($visit_info)
                                                            {
                                                              $visit_info = $visit_info->toArray()[0];

                                                              $visit_info_additional = $this->Visits->VisitInvoices->find()
                                                                ->select(['count_invoice'=>'count(VisitInvoices.id)','sum_invoices'=>'sum(VisitInvoices.amount)','max_amount_invoice'=>'max(VisitInvoices.amount)','min_amount_invoice'=>'min(VisitInvoices.amount)'])
                                                                ->where(['VisitInvoices.visit_id'=>$visit_id])
                                                                ->first();

                                                              

                                                              $this->viewBuilder()->options([
                                                                      'pdfConfig'=>[
                                                                          'filename'=>'Etat Facturation Visite - '.$visit_info->code_visit,
                                                                          'margin' => [
                                                                              'top' =>0,
                                                                              'bottom' => 12.5,
                                                                          ]
                                                                      ]
                                                                  ]);

                                                              $institution = $this->Auth->user('institution');

                                                              $this->set(compact('visit_info','visit_info_additional','institution'));
                                                            }
                                                            else
                                                            {
                                                              $this->Flash->error(__('Une Erreur est survenue, veuillez réessayer'));
                                                              return $this->redirect(['controller'=>'ManagerOperators','action'=>'general']);
                                                            }
            }
            else
            {
               $this->Flash->error(__('Vous ne pouvez accéder à cette page'));
               return $this->redirect(['controller'=>'ManagerOperators','action'=>'general']);
            }
      }
    }

}
