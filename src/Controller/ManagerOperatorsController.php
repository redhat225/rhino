<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ManagerOperators Controller
 *
 * @property \App\Model\Table\ManagerOperatorsTable $ManagerOperators
 */
class ManagerOperatorsController extends AppController
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
        $managerOperators = $this->paginate($this->ManagerOperators);

        $this->set(compact('managerOperators'));
        $this->set('_serialize', ['managerOperators']);
    }

    /**
     * View method
     *
     * @param string|null $id Manager Operator id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $managerOperator = $this->ManagerOperators->get($id, [
            'contain' => ['People', 'VisitMeetingInvoices']
        ]);

        $this->set('managerOperator', $managerOperator);
        $this->set('_serialize', ['managerOperator']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $managerOperator = $this->ManagerOperators->newEntity();
        if ($this->request->is('post')) {
            $managerOperator = $this->ManagerOperators->patchEntity($managerOperator, $this->request->data);
            if ($this->ManagerOperators->save($managerOperator)) {
                $this->Flash->success(__('The manager operator has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The manager operator could not be saved. Please, try again.'));
            }
        }
        $people = $this->ManagerOperators->People->find('list', ['limit' => 200]);
        $this->set(compact('managerOperator', 'people'));
        $this->set('_serialize', ['managerOperator']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Manager Operator id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $managerOperator = $this->ManagerOperators->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $managerOperator = $this->ManagerOperators->patchEntity($managerOperator, $this->request->data);
            if ($this->ManagerOperators->save($managerOperator)) {
                $this->Flash->success(__('The manager operator has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The manager operator could not be saved. Please, try again.'));
            }
        }
        $people = $this->ManagerOperators->People->find('list', ['limit' => 200]);
        $this->set(compact('managerOperator', 'people'));
        $this->set('_serialize', ['managerOperator']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Manager Operator id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $managerOperator = $this->ManagerOperators->get($id);
        if ($this->ManagerOperators->delete($managerOperator)) {
            $this->Flash->success(__('The manager operator has been deleted.'));
        } else {
            $this->Flash->error(__('The manager operator could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
