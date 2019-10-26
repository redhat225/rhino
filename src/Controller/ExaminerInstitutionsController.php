<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ExaminerInstitutions Controller
 *
 * @property \App\Model\Table\ExaminerInstitutionsTable $ExaminerInstitutions
 */
class ExaminerInstitutionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Institutions']
        ];
        $examinerInstitutions = $this->paginate($this->ExaminerInstitutions);

        $this->set(compact('examinerInstitutions'));
        $this->set('_serialize', ['examinerInstitutions']);
    }

    /**
     * View method
     *
     * @param string|null $id Examiner Institution id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $examinerInstitution = $this->ExaminerInstitutions->get($id, [
            'contain' => ['Institutions']
        ]);

        $this->set('examinerInstitution', $examinerInstitution);
        $this->set('_serialize', ['examinerInstitution']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $examinerInstitution = $this->ExaminerInstitutions->newEntity();
        if ($this->request->is('post')) {
            $examinerInstitution = $this->ExaminerInstitutions->patchEntity($examinerInstitution, $this->request->data);
            if ($this->ExaminerInstitutions->save($examinerInstitution)) {
                $this->Flash->success(__('The examiner institution has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The examiner institution could not be saved. Please, try again.'));
            }
        }
        $institutions = $this->ExaminerInstitutions->Institutions->find('list', ['limit' => 200]);
        $this->set(compact('examinerInstitution', 'institutions'));
        $this->set('_serialize', ['examinerInstitution']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Examiner Institution id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $examinerInstitution = $this->ExaminerInstitutions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $examinerInstitution = $this->ExaminerInstitutions->patchEntity($examinerInstitution, $this->request->data);
            if ($this->ExaminerInstitutions->save($examinerInstitution)) {
                $this->Flash->success(__('The examiner institution has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The examiner institution could not be saved. Please, try again.'));
            }
        }
        $institutions = $this->ExaminerInstitutions->Institutions->find('list', ['limit' => 200]);
        $this->set(compact('examinerInstitution', 'institutions'));
        $this->set('_serialize', ['examinerInstitution']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Examiner Institution id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $examinerInstitution = $this->ExaminerInstitutions->get($id);
        if ($this->ExaminerInstitutions->delete($examinerInstitution)) {
            $this->Flash->success(__('The examiner institution has been deleted.'));
        } else {
            $this->Flash->error(__('The examiner institution could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
