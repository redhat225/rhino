<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ManagerActs Controller
 *
 * @property \App\Model\Table\ManagerActsTable $ManagerActs
 */
class ManagerActsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $managerActs = $this->paginate($this->ManagerActs);

        $this->set(compact('managerActs'));
        $this->set('_serialize', ['managerActs']);
    }

    /**
     * View method
     *
     * @param string|null $id Manager Act id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $managerAct = $this->ManagerActs->get($id, [
            'contain' => []
        ]);

        $this->set('managerAct', $managerAct);
        $this->set('_serialize', ['managerAct']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $managerAct = $this->ManagerActs->newEntity();
        if ($this->request->is('post')) {
            $managerAct = $this->ManagerActs->patchEntity($managerAct, $this->request->data);
            if ($this->ManagerActs->save($managerAct)) {
                $this->Flash->success(__('The manager act has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The manager act could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('managerAct'));
        $this->set('_serialize', ['managerAct']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Manager Act id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $managerAct = $this->ManagerActs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $managerAct = $this->ManagerActs->patchEntity($managerAct, $this->request->data);
            if ($this->ManagerActs->save($managerAct)) {
                $this->Flash->success(__('The manager act has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The manager act could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('managerAct'));
        $this->set('_serialize', ['managerAct']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Manager Act id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $managerAct = $this->ManagerActs->get($id);
        if ($this->ManagerActs->delete($managerAct)) {
            $this->Flash->success(__('The manager act has been deleted.'));
        } else {
            $this->Flash->error(__('The manager act could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
