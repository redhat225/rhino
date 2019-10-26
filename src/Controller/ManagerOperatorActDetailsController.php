<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ManagerOperatorActDetails Controller
 *
 * @property \App\Model\Table\ManagerOperatorActDetailsTable $ManagerOperatorActDetails
 */
class ManagerOperatorActDetailsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ManagerOperators', 'ManagerOperatorActs']
        ];
        $managerOperatorActDetails = $this->paginate($this->ManagerOperatorActDetails);

        $this->set(compact('managerOperatorActDetails'));
        $this->set('_serialize', ['managerOperatorActDetails']);
    }

    /**
     * View method
     *
     * @param string|null $id Manager Operator Act Detail id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $managerOperatorActDetail = $this->ManagerOperatorActDetails->get($id, [
            'contain' => ['ManagerOperators', 'ManagerOperatorActs']
        ]);

        $this->set('managerOperatorActDetail', $managerOperatorActDetail);
        $this->set('_serialize', ['managerOperatorActDetail']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $managerOperatorActDetail = $this->ManagerOperatorActDetails->newEntity();
        if ($this->request->is('post')) {
            $managerOperatorActDetail = $this->ManagerOperatorActDetails->patchEntity($managerOperatorActDetail, $this->request->data);
            if ($this->ManagerOperatorActDetails->save($managerOperatorActDetail)) {
                $this->Flash->success(__('The manager operator act detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The manager operator act detail could not be saved. Please, try again.'));
            }
        }
        $managerOperators = $this->ManagerOperatorActDetails->ManagerOperators->find('list', ['limit' => 200]);
        $managerOperatorActs = $this->ManagerOperatorActDetails->ManagerOperatorActs->find('list', ['limit' => 200]);
        $this->set(compact('managerOperatorActDetail', 'managerOperators', 'managerOperatorActs'));
        $this->set('_serialize', ['managerOperatorActDetail']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Manager Operator Act Detail id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $managerOperatorActDetail = $this->ManagerOperatorActDetails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $managerOperatorActDetail = $this->ManagerOperatorActDetails->patchEntity($managerOperatorActDetail, $this->request->data);
            if ($this->ManagerOperatorActDetails->save($managerOperatorActDetail)) {
                $this->Flash->success(__('The manager operator act detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The manager operator act detail could not be saved. Please, try again.'));
            }
        }
        $managerOperators = $this->ManagerOperatorActDetails->ManagerOperators->find('list', ['limit' => 200]);
        $managerOperatorActs = $this->ManagerOperatorActDetails->ManagerOperatorActs->find('list', ['limit' => 200]);
        $this->set(compact('managerOperatorActDetail', 'managerOperators', 'managerOperatorActs'));
        $this->set('_serialize', ['managerOperatorActDetail']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Manager Operator Act Detail id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $managerOperatorActDetail = $this->ManagerOperatorActDetails->get($id);
        if ($this->ManagerOperatorActDetails->delete($managerOperatorActDetail)) {
            $this->Flash->success(__('The manager operator act detail has been deleted.'));
        } else {
            $this->Flash->error(__('The manager operator act detail could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
