<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ExamEvidences Controller
 *
 * @property \App\Model\Table\ExamEvidencesTable $ExamEvidences
 */
class ExamEvidencesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Exams']
        ];
        $examEvidences = $this->paginate($this->ExamEvidences);

        $this->set(compact('examEvidences'));
        $this->set('_serialize', ['examEvidences']);
    }

    /**
     * View method
     *
     * @param string|null $id Exam Evidence id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $examEvidence = $this->ExamEvidences->get($id, [
            'contain' => ['Exams']
        ]);

        $this->set('examEvidence', $examEvidence);
        $this->set('_serialize', ['examEvidence']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $examEvidence = $this->ExamEvidences->newEntity();
        if ($this->request->is('post')) {
            $examEvidence = $this->ExamEvidences->patchEntity($examEvidence, $this->request->data);
            if ($this->ExamEvidences->save($examEvidence)) {
                $this->Flash->success(__('The exam evidence has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The exam evidence could not be saved. Please, try again.'));
            }
        }
        $exams = $this->ExamEvidences->Exams->find('list', ['limit' => 200]);
        $this->set(compact('examEvidence', 'exams'));
        $this->set('_serialize', ['examEvidence']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Exam Evidence id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $examEvidence = $this->ExamEvidences->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $examEvidence = $this->ExamEvidences->patchEntity($examEvidence, $this->request->data);
            if ($this->ExamEvidences->save($examEvidence)) {
                $this->Flash->success(__('The exam evidence has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The exam evidence could not be saved. Please, try again.'));
            }
        }
        $exams = $this->ExamEvidences->Exams->find('list', ['limit' => 200]);
        $this->set(compact('examEvidence', 'exams'));
        $this->set('_serialize', ['examEvidence']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Exam Evidence id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $examEvidence = $this->ExamEvidences->get($id);
        if ($this->ExamEvidences->delete($examEvidence)) {
            $this->Flash->success(__('The exam evidence has been deleted.'));
        } else {
            $this->Flash->error(__('The exam evidence could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
