<?php
namespace App\Controller\Patient;

use App\Controller\AppController;
use Cake\Event\Event;
/**
 * PatientBookings Controller
 *
 * @property \App\Model\Table\PatientBookingsTable $PatientBookings
 */
class PatientBookingsController extends AppController
{


    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Institutions','Doctors.People'],
            'sortWhitelist' => ['PatientBookings.expected_date_booking','PatientBookings.created'],
            'conditions' => ['PatientBookings.patient_id'=>$this->Auth->user('id')],
            'limit' => '5'
        ];

        $patientBookings = $this->paginate($this->PatientBookings);

        $institutions = $this->PatientBookings->Institutions->find();

        $this->loadModel('Doctors');
        $doctors = $this->Doctors->find()->contain(['People']);

        $this->set(compact('doctors','patientBookings','institutions'));
        $this->set('_serialize', ['patientBookings','doctors','institutions']);
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->viewBuilder()->layout('dashboard');
    }

    public function remove()
    {
        if($this->request->is('ajax'))
        {
            if($this->request->is('post'))
            {
              $data = $this->request->data;
              $meeting = $this->PatientBookings->get($data['id_booking']);

              $meeting->deleted=new \DateTime('NOW');
              $meeting->state = 3;
              $meeting->dirty();
              if($this->PatientBookings->save($meeting))
              {
                echo "ok";
              }
              else
              {
                echo "ko";
              }
            }
            exit();
        }
    }

    public function add()
    {
        if($this->request->is('post'))
        {
            $data = $this->request->data;
            $data['patient_id'] = $this->Auth->user('id');
            $data['type_request']='web_save';
            $patient_booking = $this->PatientBookings->newEntity($data);
            if($this->PatientBookings->save($patient_booking))
            {
                $this->Flash->success(__("Votre réservation a été prise en compte"));
            }
            else
            {
                $this->Flash->error(__("Une Erreur est survenue veuillez réessayer"));
            }
           return $this->redirect(['action'=>'index']);
        }
    }

    public function edit()
    {
        if($this->request->is('ajax'))
        {
            if($this->request->is('post'))
            {
                $data = $this->request->data;
                $patient_booking = $this->PatientBookings->get($data['booking_id']);
                $patient_booking->patient_id = $this->Auth->user('id');
                $data['type_request']='web_edit';

                $patient_booking = $this->PatientBookings->patchEntity($patient_booking,$data);

                if($this->PatientBookings->save($patient_booking))
                {
                    echo "ok";
                }
                else
                {
                    echo "ko";
                }
            }
            exit();
            
        }
    }

}
