<?php 
namespace App\View\Cell;

use Cake\View\Cell;

class InboxBookingManagerCell extends Cell
{
	// Default function
	public function display()
	{

	}

	public function inbox($institution_id)
	{
		$this->loadModel('PatientBookings');
		$patient_bookings = $this->PatientBookings->find()
											->contain(['Patients.People.PeopleContacts','Doctors.People'])
											->where(['PatientBookings.institution_id'=>$institution_id])
											->andWhere(['PatientBookings.state'=>2])
											->order(['PatientBookings.created'=>'ASC']);
		$patient_booking_count = $patient_bookings->count();

		$this->set(compact('patient_bookings','patient_booking_count'));
	}

}