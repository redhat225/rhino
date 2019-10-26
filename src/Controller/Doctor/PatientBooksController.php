<?php
namespace App\Controller\Doctor;

use App\Controller\AppController;

/**
 * PatientBooks Controller
 *
 * @property \App\Model\Table\PatientBooksTable $PatientBooks
 */
class PatientBooksController extends AppController
{

    public function view($patient_id)
    {
        $url = '/patient/patient-books/book/'.$patient_id;
        $this->set(compact('url'));
    }

    public function book($patient_id)
    {
         $book_changed = $this->PatientBooks->find()
                                            ->where(['PatientBooks.patient_id'=>$patient_id])
                                            ->first();
        $this->response->file('Files'.DS.'patient'.DS.'books'.DS.$book_changed->book_path);

        return $this->response;
    }

    public function bookBuilder()
    {
        if($this->request->is('ajax'))
        {
            if($this->request->is('post'))
            {
                $patient_id = $this->request->data['patient_id'];
                if((int)$patient_id===$this->Auth->user('id'))
                {
                    //checking book changes
                    $book_changed = $this->PatientBooks->find()
                                                        ->where(['PatientBooks.patient_id'=>$patient_id])
                                                       ->first();

                    if($book_changed->changed===1)
                    {
                        //destroying the older book
                        $opendir=opendir(APP."Files".DS."patient".DS."books".DS);
                        if(file_exists(APP."Files".DS."patient".DS."books".DS.$book_changed->book_path))
                          unlink(APP."Files".DS."patient".DS."books".DS.$book_changed->book_path);
                        closedir($opendir); 
                        
                        $nameFile=md5(uniqid('',true));
                        $book_changed->book_path = $nameFile.".pdf";
                        $book_changed->changed=0;

                        $path_book = $book_changed->book_path;

                        if($this->PatientBooks->save($book_changed))
                        {
                            //buiding patient book
                            $patient_id = $this->request->data['patient_id'];
                            $patient = $this->PatientBooks->Patients->find()
                                ->contain(['PatientAntecedents.PatientAntecedentTypes','People.PeopleSituations','People.PeopleAdresses','People.PeopleAttributes','People.PeopleContacts','PatientCompanies','Visits.VisitTypes','Visits.VisitMeetings.Doctors.People','Visits.ManagerOperators.Institutions','Visits.VisitMeetings.ExamUnderTypes.ExamTypes','Visits.VisitMeetings.Treatments.TreatmentRequirements'])
                                ->where(['Patients.id'=>$patient_id])->first();

                            $this->set(compact('patient','path_book'));
                        }
                        else
                        {
                            echo "ko";
                            exit();
                        }
                    }
                    else
                    {
                        echo "ok";
                        exit();
                    }

                }
                else
                {
                    echo "ko";
                    exit();
                }
                
            }
        }
    }

}
