<?php
namespace App\Controller\Doctor;

use App\Controller\AppController;

/**
 * TreatmentRequirements Controller
 *
 * @property \App\Model\Table\TreatmentRequirementsTable $TreatmentRequirements
 */
class TreatmentRequirementsController extends AppController
{

    public function get()
    {
        if($this->request->is('ajax'))
        {
            if($this->request->is('get'))
            {
                $query_data = $this->request->query;
                $treatment_requirements = $this->TreatmentRequirements->find()
                													  ->where(['TreatmentRequirements.treatment_id'=>$query_data['id']]);
              	if(!$treatment_requirements->isEmpty())
              	{
              		echo json_encode($treatment_requirements->toArray());
              	}
              	else
              	{
              		echo 'ko';
              	}
                exit();
            }
        }
    }


    public function add()
    {
    	if($this->request->is('ajax'))
    	{
    		if($this->request->is('get'))
    		{
    			$query_data = $this->request->query;
    			$treatment_id = $query_data['treatment-id'];
    			$this->set(compact('treatment_id'));
    		}

    		if($this->request->is('post'))
    		{
    			$data = $this->request->data;
    			//get patient info
    			$treatment = $this->TreatmentRequirements->Treatments->get($data['treatment_id'],['contain'=>['VisitMeetings']]);
    			$treatment_requirement = $this->TreatmentRequirements->newEntity($data);
    			$treatment_requirement->patient_id = $treatment->visit_meeting->patient_id;
    			if($this->TreatmentRequirements->save($treatment_requirement))
    			{
    				echo 'ok';
    			}
    			else
    				echo 'ko';
    			exit();
    		}
    	}
    }

    public function show($visit_meeting_id)
    {
    	$this->loadModel('VisitMeetings');
    	$requirements = $this->VisitMeetings->find()
    										->contain(['Treatments.TreatmentRequirements','Patients.People','Doctors.People'])
    										->where(['VisitMeetings.id'=>$visit_meeting_id])->toArray();
    	if($requirements)
    	{
			$this->set(compact('requirements'));
    	}
    	else
    	{
    		return $this->redirect(['controller'=>'Doctors','action'=>'general']);
    	}
    	
    }



}
