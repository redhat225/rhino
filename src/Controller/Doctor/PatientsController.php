<?php
namespace App\Controller\Doctor;

use App\Controller\AppController;
use cake\Event\Event;
/**
 * Patients Controller
 *
 * @property \App\Model\Table\PatientsTable $Patients
 */
class PatientsController extends AppController
{

    public function view($patient_id)
    {
        $patient = $this->Patients->find()
                                       ->contain(['People.PeopleAdresses','People.PeopleContacts','People.PeopleAttributes','PatientAntecedents.PatientAntecedentTypes','Visits','PatientCompanies'])
                                       ->where(['Patients.id'=>$patient_id])->first();
        $visits = $this->Patients->Visits->find()
                                         ->contain(['ManagerOperators.Institutions','VisitTypes'])
                                         ->where(['Visits.patient_id'=>$patient_id]);
        $this->set(compact('patient','visits'));
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->viewBuilder()->layout('dashboard');
        //checking if the doctor has the rights for checking this patient folder
    }

    public function beforeRender(Event $event)
    {
        parent::beforeRender($event);
        $doctor_id = $this->Auth->user('id');
        $this->set(compact('doctor_id'));
    }
}
