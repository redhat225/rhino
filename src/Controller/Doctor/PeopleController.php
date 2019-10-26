<?php
namespace App\Controller\Doctor;

use App\Controller\AppController;
use Cake\Event\Event;
/**
 * People Controller
 *
 * @property \App\Model\Table\PeopleTable $People
 */
class PeopleController extends AppController
{

    public function view()
    {
        $people = $this->People->find()
                               ->contain(['Doctors.DoctorSpecialities'])
                               ->where(['Doctors.id'=>$this->Auth->user('id')])
                               ->select(['formatted_born'=>'DATE_FORMAT(People.dateborn,"%d-%m-%Y")'])
                               ->autoFields(true)->first();
        $this->set(compact('people'));
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->viewBuilder()->layout('dashboard');
    }

    public function beforeRender(Event $event)
    {
        $doctor_id = $this->Auth->user('id');
        $this->set(compact('doctor_id'));
    }
}
