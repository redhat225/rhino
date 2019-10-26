<?php
namespace App\Controller\Manager;

use App\Controller\AppController;

/**
 * PatientInsurances Controller
 *
 * @property \App\Model\Table\PatientInsurancesTable $PatientInsurances
 */
class PatientInsurancesController extends AppController
{

    public function add()
    {
        if($this->request->is('ajax'))
        {
           if($this->request->is('post'))
           {
            $data = $this->request->data;
            $patient_insurance = $this->PatientInsurances->newEntity($data);
            $patient_insurance->state=1;
            $patient_insurance->institution_id = $this->Auth->user('institution_id');
            

            if($this->PatientInsurances->save($patient_insurance))
            {
                echo 'ok';
            }
            else
            {
                if($patient_insurance->errors('number_card'))
                  echo 'already';
                else
                  echo 'ko';
            }

            exit();
           }

        }
    }



}
