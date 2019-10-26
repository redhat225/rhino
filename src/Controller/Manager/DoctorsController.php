<?php
namespace App\Controller\Manager;

use App\Controller\AppController;

/**
 * Doctors Controller
 *
 * @property \App\Model\Table\DoctorsTable $Doctors
 */
class DoctorsController extends AppController
{

    public function getSpecialities()
    {
        if($this->request->is('ajax'))
        {
            if($this->request->is('get'))
            {
                $query_data = $this->request->query;

                $specialities = $this->Doctors->find()
                                              ->contain(['InstitutionDoctors'=>function($q){
                                                return $q->where(['InstitutionDoctors.institution_id'=>1]) ;
                                              },'InstitutionDoctors.DoctorSpecialities'])
                                              ->where(['Doctors.id'=>$query_data['id_doctor']]);

                if($specialities->isEmpty())
                    echo 'ko';
                else
                    echo json_encode($specialities->first());
                exit();
            }
        }
    }

    public function searchSingle()
    {
        if($this->request->is('ajax'))
        {
            if($this->request->is('get'))
            {

                $people_id = $this->request->query('people-id');

                $doctor  = $this->Doctors->find()
                                         ->contain(['People.PeopleContacts','People.PeopleSituations','InstitutionDoctors'=>function($q){return $q->where(['InstitutionDoctors.institution_id'=>$this->Auth->user('id')]);},'InstitutionDoctors.DoctorSpecialities.VisitSpecialities','People.PeopleAdresses.CountryTownships.CountryCities.Countries','VisitInterventionDoctors.Visits.VisitStates.VisitStateTypes','VisitInterventionDoctors.Visits.VisitStates'=>function($q){return $q->order(['VisitStates.created'=>'DESC']);},'VisitInterventionDoctors.Visits.Patients.People','VisitInterventionDoctors.VisitInvoices','VisitInterventionDoctors.Visits.ManagerOperators.Institutions'=>function($q){return $q->where(['ManagerOperators.institution_id'=>$this->Auth->user('institution_id')]);}])
                                         ->where(['People.id'=>$people_id])
                                         ->map(function($row){
                                                foreach ($row->visit_intervention_doctors as $intervention)
                                                {
                                                    $formatted_created = new \DateTime($intervention->created);
                                                    $intervention->formatted_created = $formatted_created->format('d-m-Y H:i:s');

                                                    if($intervention->intervention_done)
                                                    {
                                                        $formatted_done = new \DateTime($intervention->intervention_done);
                                                        $intervetion->formatted_done = $formatted_done->format('d-m-Y H:i:s');
                                                    }
                                                    else
                                                    {
                                                        $intervention->formatted_done = null;
                                                    }


                                                    $formatted_expected = new \DateTime($intervention->expected_meeting_date);
                                                    $intervention->expected_meeting_date = $formatted_expected->format('d-m-Y H:i:s');

                                                    // $look = $intervention->visit_invoice['code_invoice'];

                                                    $countdown = 0;
                                                    $search = true; 

                                                    while($search)   
                                                    {

                                                        if(file_exists(WWW_ROOT."Files/manager/".$intervention->visit->manager_operator->institution->slug."/invoices_images/".$intervention->visit_invoice['code_invoice'].'-'.$countdown.'.jpg'))
                                                        {
                                                            $countdown++;
                                                        }
                                                        else
                                                        {
                                                            $search = false;
                                                            $intervention->bill_count = $countdown;
                                                        }
                                                    }
                                                }

                                                return $row;
                                         });

                // debug($doctor->toArray());
                if($doctor)
                {
                    echo json_encode($doctor);
                }
                else
                    echo 'ko'; 

                exit();
            }
        }
    }


}
