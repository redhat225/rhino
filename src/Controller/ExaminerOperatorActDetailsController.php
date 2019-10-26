<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ExaminerOperatorActDetails Controller
 *
 * @property \App\Model\Table\ExaminerOperatorActDetailsTable $ExaminerOperatorActDetails
 */
class ExaminerOperatorActDetailsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ExaminerOperatorActs', 'ExaminerOperators']
        ];
        $examinerOperatorActDetails = $this->paginate($this->ExaminerOperatorActDetails);

        $this->set(compact('examinerOperatorActDetails'));
        $this->set('_serialize', ['examinerOperatorActDetails']);
    }

    /**
     * View method
     *
     * @param string|null $id Examiner Operator Act Detail id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $examinerOperatorActDetail = $this->ExaminerOperatorActDetails->get($id, [
            'contain' => ['ExaminerOperatorActs', 'ExaminerOperators']
        ]);

        $this->set('examinerOperatorActDetail', $examinerOperatorActDetail);
        $this->set('_serialize', ['examinerOperatorActDetail']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $examinerOperatorActDetail = $this->ExaminerOperatorActDetails->newEntity();
        if ($this->request->is('post')) {
            $examinerOperatorActDetail = $this->ExaminerOperatorActDetails->patchEntity($examinerOperatorActDetail, $this->request->data);
            if ($this->ExaminerOperatorActDetails->save($examinerOperatorActDetail)) {
                $this->Flash->success(__('The examiner operator act detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The examiner operator act detail could not be saved. Please, try again.'));
            }
        }
        $examinerOperatorActs = $this->ExaminerOperatorActDetails->ExaminerOperatorActs->find('list', ['limit' => 200]);
        $examinerOperators = $this->ExaminerOperatorActDetails->ExaminerOperators->find('list', ['limit' => 200]);
        $this->set(compact('examinerOperatorActDetail', 'examinerOperatorActs', 'examinerOperators'));
        $this->set('_serialize', ['examinerOperatorActDetail']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Examiner Operator Act Detail id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $examinerOperatorActDetail = $this->ExaminerOperatorActDetails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $examinerOperatorActDetail = $this->ExaminerOperatorActDetails->patchEntity($examinerOperatorActDetail, $this->request->data);
            if ($this->ExaminerOperatorActDetails->save($examinerOperatorActDetail)) {
                $this->Flash->success(__('The examiner operator act detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The examiner operator act detail could not be saved. Please, try again.'));
            }
        }
        $examinerOperatorActs = $this->ExaminerOperatorActDetails->ExaminerOperatorActs->find('list', ['limit' => 200]);
        $examinerOperators = $this->ExaminerOperatorActDetails->ExaminerOperators->find('list', ['limit' => 200]);
        $this->set(compact('examinerOperatorActDetail', 'examinerOperatorActs', 'examinerOperators'));
        $this->set('_serialize', ['examinerOperatorActDetail']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Examiner Operator Act Detail id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $examinerOperatorActDetail = $this->ExaminerOperatorActDetails->get($id);
        if ($this->ExaminerOperatorActDetails->delete($examinerOperatorActDetail)) {
            $this->Flash->success(__('The examiner operator act detail has been deleted.'));
        } else {
            $this->Flash->error(__('The examiner operator act detail could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
