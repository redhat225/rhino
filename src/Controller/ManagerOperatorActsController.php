<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ManagerOperatorActs Controller
 *
 * @property \App\Model\Table\ManagerOperatorActsTable $ManagerOperatorActs
 */
class ManagerOperatorActsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $managerOperatorActs = $this->paginate($this->ManagerOperatorActs);

        $this->set(compact('managerOperatorActs'));
        $this->set('_serialize', ['managerOperatorActs']);
    }

    /**
     * View method
     *
     * @param string|null $id Manager Operator Act id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $managerOperatorAct = $this->ManagerOperatorActs->get($id, [
            'contain' => ['ManagerOperatorActDetails']
        ]);

        $this->set('managerOperatorAct', $managerOperatorAct);
        $this->set('_serialize', ['managerOperatorAct']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $managerOperatorAct = $this->ManagerOperatorActs->newEntity();
        if ($this->request->is('post')) {
            $managerOperatorAct = $this->ManagerOperatorActs->patchEntity($managerOperatorAct, $this->request->data);
            if ($this->ManagerOperatorActs->save($managerOperatorAct)) {
                $this->Flash->success(__('The manager operator act has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The manager operator act could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('managerOperatorAct'));
        $this->set('_serialize', ['managerOperatorAct']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Manager Operator Act id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $managerOperatorAct = $this->ManagerOperatorActs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $managerOperatorAct = $this->ManagerOperatorActs->patchEntity($managerOperatorAct, $this->request->data);
            if ($this->ManagerOperatorActs->save($managerOperatorAct)) {
                $this->Flash->success(__('The manager operator act has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The manager operator act could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('managerOperatorAct'));
        $this->set('_serialize', ['managerOperatorAct']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Manager Operator Act id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $managerOperatorAct = $this->ManagerOperatorActs->get($id);
        if ($this->ManagerOperatorActs->delete($managerOperatorAct)) {
            $this->Flash->success(__('The manager operator act has been deleted.'));
        } else {
            $this->Flash->error(__('The manager operator act could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
