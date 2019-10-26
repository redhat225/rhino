<?php 
namespace App\View\Cell;

use Cake\View\Cell;

class InboxDoctorCell extends Cell
{
	// Default function
	public function display()
	{

	}

	//meeting cell
	public function meeting($doctor_id)
	{

		$nowDate = new \DateTime('NOW');

		$this->loadModel('VisitMeetings');
        $unpracticed =$this->VisitMeetings->find()
        								  ->contain(['Visits.Patients.People','Visits.ManagerOperators.Institutions','PatientBookings'])
        								  ->where(['VisitMeetings.doctor_id'=>$doctor_id,'VisitMeetings.done'=>0])
        								  ->andWhere(['DATE_FORMAT(VisitMeetings.expected_meeting_date,"%Y-%m-%d")'=>$nowDate->format('Y-m-d')])
        								  ->order(['VisitMeetings.expected_meeting_date'=>'ASC']);
        $unpracticed_count = $unpracticed->count();
		$this->set(compact('unpracticed','unpracticed_count'));		
	}

}