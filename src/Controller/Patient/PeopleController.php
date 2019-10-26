<?php
namespace App\Controller\Patient;

use App\Controller\AppController;
use cake\Event\Event;
use Cake\Utility\Security;
/**
 * Patients Controller
 *
 * @property \App\Model\Table\PatientsTable $Patients
 */
class PeopleController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->viewBuilder()->layout("dashboard");
    }

    public function view()
    {
    	$people = $this->People->find()	
    						   ->contain(['PeopleSituations','PeopleDescendants','PeopleContacts','PeopleAttributes','Patients.PatientCompanies','PeopleAdresses','Patients.PatientInsurances.PatientInsurers'])
    						   ->select(['formatted_born'=>'DATE_FORMAT(People.dateborn,"%d-%m-%Y")'])
    						   ->autoFields(true)
    						   ->where(['People.id'=>$this->Auth->user('people_id')])
    						   ->first();
    	$this->set(compact('people'));
    }

    public function paper()
    {
    	$paper = $this->People->find()
    						  ->contain(['Patients.PatientAntecedents.PatientAntecedentTypes','Patients.Visits.VisitMeetings.Doctors.People'])
    						  ->where(['People.id'=>$this->Auth->user('people_id')])->first();

    	$this->set(compact('paper'));
    }

}
