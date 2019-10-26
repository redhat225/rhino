<?php
namespace App\Controller\Doctor;

use App\Controller\AppController;

/**
 * Exams Controller
 *
 * @property \App\Model\Table\ExamsTable $Exams
 */
class ExamsController extends AppController
{

    public function add()
    {
        if($this->request->is('ajax'))
        {
            if($this->request->is('get'))
            {
                $this->loadModel('ExamTypes');
                $type_exams = $this->ExamTypes->find();
                $under_type_exams = $this->ExamTypes->ExamUnderTypes->find()
                                                         ->where(['ExamUnderTypes.exam_type_id'=>1]);
                $this->set(compact('type_exams','under_type_exams'));
            }
        }
    }


    public function addUnderTypeExams()
    {
        if($this->request->is('ajax'))
        {
            if($this->request->is('get'))
            {
                $this->loadModel('ExamUnderTypes');
                $query_data = $this->request->query;
                $under_type_exams = $this->ExamUnderTypes->find()
                                                         ->where(['ExamUnderTypes.exam_type_id'=>$query_data['type_exam_id']]);
                $index = $query_data['index'];
                $this->set(compact('under_type_exams','index'));
            }
        }
    }

    public function addInline()
    {
        if($this->request->is('ajax'))
        {
            if($this->request->is('get'))
            {
                $this->loadModel('ExamTypes');
                $type_exams = $this->ExamTypes->find();
                $under_type_exams = $this->ExamTypes->ExamUnderTypes->find()
                                                         ->where(['ExamUnderTypes.exam_type_id'=>1]);
                $visit_meeting_id = $this->request->query['visit-meeting-id'];
                $this->set(compact('type_exams','under_type_exams','visit_meeting_id'));
            }
        }
    }

    public function addUnderExamInline()
    {
        if($this->request->is('ajax'))
        {
            if($this->request->is('get'))
            {
                $this->loadModel('ExamUnderTypes');
                $query_data = $this->request->query;
                $under_type_exams = $this->ExamUnderTypes->find()
                                                         ->where(['ExamUnderTypes.exam_type_id'=>$query_data['type_exam_id']]);
                $this->set(compact('under_type_exams'));
            }
        }
    }

    public function saveExam()
    {
        if($this->request->is('ajax'))
        {
            if($this->request->is('post'))
            {
                $data = $this->request->data;
                $data['save'] = 'save';
                $exam = $this->Exams->newEntity($data);
                if($this->Exams->save($exam))
                {
                    echo json_encode($exam);
                }
                else
                {
                    echo 'ko';
                }
                exit();
            }
        }
    }

    public function show($id_meeting)
    {
            $exams = $this->Exams->find()
                        ->contain(['ExamUnderTypes.ExamTypes','VisitMeetings.Patients.People','VisitMeetings.Doctors.People'])
                        ->where(['VisitMeetings.id'=>$id_meeting])->toArray();
            if($exams)
            {
               $this->set(compact('exams'));
            }
            else
            {
                $this->Flash->error(__('Impossible d\'effectuer cette action'));
                return $this->redirect(['controller'=>'doctors','action'=>'general']);
            }
           
    }

}