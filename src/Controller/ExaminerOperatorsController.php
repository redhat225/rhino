<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ExaminerOperators Controller
 *
 * @property \App\Model\Table\ExaminerOperatorsTable $ExaminerOperators
 */
class ExaminerOperatorsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['People']
        ];
        $examinerOperators = $this->paginate($this->ExaminerOperators);

        $this->set(compact('examinerOperators'));
        $this->set('_serialize', ['examinerOperators']);
    }

    /**
     * View method
     *
     * @param string|null $id Examiner Operator id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $examinerOperator = $this->ExaminerOperators->get($id, [
            'contain' => ['People', 'ExaminerOperatorActDetails']
        ]);

        $this->set('examinerOperator', $examinerOperator);
        $this->set('_serialize', ['examinerOperator']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $examinerOperator = $this->ExaminerOperators->newEntity();
        if ($this->request->is('post')) {
            $examinerOperator = $this->ExaminerOperators->patchEntity($examinerOperator, $this->request->data);
            if ($this->ExaminerOperators->save($examinerOperator)) {
                $this->Flash->success(__('The examiner operator has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The examiner operator could not be saved. Please, try again.'));
            }
        }
        $people = $this->ExaminerOperators->People->find('list', ['limit' => 200]);
        $this->set(compact('examinerOperator', 'people'));
        $this->set('_serialize', ['examinerOperator']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Examiner Operator id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $examinerOperator = $this->ExaminerOperators->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $examinerOperator = $this->ExaminerOperators->patchEntity($examinerOperator, $this->request->data);
            if ($this->ExaminerOperators->save($examinerOperator)) {
                $this->Flash->success(__('The examiner operator has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The examiner operator could not be saved. Please, try again.'));
            }
        }
        $people = $this->ExaminerOperators->People->find('list', ['limit' => 200]);
        $this->set(compact('examinerOperator', 'people'));
        $this->set('_serialize', ['examinerOperator']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Examiner Operator id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $examinerOperator = $this->ExaminerOperators->get($id);
        if ($this->ExaminerOperators->delete($examinerOperator)) {
            $this->Flash->success(__('The examiner operator has been deleted.'));
        } else {
            $this->Flash->error(__('The examiner operator could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
