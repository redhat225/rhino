<?php
namespace App\Controller\Manager;
use App\Controller\AppController;


/**
 * DoctorSpecialities Controller
 *
 * @property \App\Model\Table\DoctorSpecialitiesTable $DoctorSpecialities
 */
class DoctorSpecialitiesController extends AppController
{
    public function addSpeciality()
    {
        if($this->request->is('ajax'))
        {
          if($this->request->is('post'))
          {
            $data = $this->request->data;
            $specialities = split(',',$data['specialities']);
            $doctor_id = $data['doctor-id'];

            $doctor_specialities = $this->DoctorSpecialities->find()
                                                          ->contain(['InstitutionDoctors'])
                                                          ->where(['InstitutionDoctors.doctor_id'=>$doctor_id,'InstitutionDoctors.institution_id'=>$this->Auth->user('id')]);


            foreach ($doctor_specialities as $doctor_speciality) {
                foreach ($specialities as $key => $value) {
                        if($doctor_speciality->visit_speciality_id==$value)
                            unset($specialities[$key]);
                }   
            }

            $builder_entities = [];
            foreach ($specialities as $speciality)
                {
                    $builder_entity = [
                        'institution_doctor_id' => 1,
                        'visit_speciality_id' => $speciality
                    ];
                    array_push($builder_entities, $builder_entity);
                }
            $entities_doctor_specialities = $this->DoctorSpecialities->newEntities($builder_entities);
            
            if(!empty($entities_doctor_specialities))
            {
                if($this->DoctorSpecialities->saveMany($entities_doctor_specialities))
                {
                    echo 'ok';
                }
                else
                {
                    echo 'ko';
                }
            }
            else
            {
                echo 'already';
            }

            exit();
          }

        }
    }
}
