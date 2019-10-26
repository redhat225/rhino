<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ExaminerOperatorActs Controller
 *
 * @property \App\Model\Table\ExaminerOperatorActsTable $ExaminerOperatorActs
 */
class ExaminerOperatorActsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $examinerOperatorActs = $this->paginate($this->ExaminerOperatorActs);

        $this->set(compact('examinerOperatorActs'));
        $this->set('_serialize', ['examinerOperatorActs']);
    }

    /**
     * View method
     *
     * @param string|null $id Examiner Operator Act id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $examinerOperatorAct = $this->ExaminerOperatorActs->get($id, [
            'contain' => ['ExaminerOperatorActDetails']
        ]);

        $this->set('examinerOperatorAct', $examinerOperatorAct);
        $this->set('_serialize', ['examinerOperatorAct']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $examinerOperatorAct = $this->ExaminerOperatorActs->newEntity();
        if ($this->request->is('post')) {
            $examinerOperatorAct = $this->ExaminerOperatorActs->patchEntity($examinerOperatorAct, $this->request->data);
            if ($this->ExaminerOperatorActs->save($examinerOperatorAct)) {
                $this->Flash->success(__('The examiner operator act has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The examiner operator act could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('examinerOperatorAct'));
        $this->set('_serialize', ['examinerOperatorAct']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Examiner Operator Act id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $examinerOperatorAct = $this->ExaminerOperatorActs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $examinerOperatorAct = $this->ExaminerOperatorActs->patchEntity($examinerOperatorAct, $this->request->data);
            if ($this->ExaminerOperatorActs->save($examinerOperatorAct)) {
                $this->Flash->success(__('The examiner operator act has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The examiner operator act could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('examinerOperatorAct'));
        $this->set('_serialize', ['examinerOperatorAct']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Examiner Operator Act id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $examinerOperatorAct = $this->ExaminerOperatorActs->get($id);
        if ($this->ExaminerOperatorActs->delete($examinerOperatorAct)) {
            $this->Flash->success(__('The examiner operator act has been deleted.'));
        } else {
            $this->Flash->error(__('The examiner operator act could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
