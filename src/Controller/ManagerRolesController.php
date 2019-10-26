<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ManagerRoles Controller
 *
 * @property \App\Model\Table\ManagerRolesTable $ManagerRoles
 */
class ManagerRolesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $managerRoles = $this->paginate($this->ManagerRoles);

        $this->set(compact('managerRoles'));
        $this->set('_serialize', ['managerRoles']);
    }

    /**
     * View method
     *
     * @param string|null $id Manager Role id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $managerRole = $this->ManagerRoles->get($id, [
            'contain' => ['ManagerRoleDetails']
        ]);

        $this->set('managerRole', $managerRole);
        $this->set('_serialize', ['managerRole']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $managerRole = $this->ManagerRoles->newEntity();
        if ($this->request->is('post')) {
            $managerRole = $this->ManagerRoles->patchEntity($managerRole, $this->request->data);
            if ($this->ManagerRoles->save($managerRole)) {
                $this->Flash->success(__('The manager role has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The manager role could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('managerRole'));
        $this->set('_serialize', ['managerRole']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Manager Role id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $managerRole = $this->ManagerRoles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $managerRole = $this->ManagerRoles->patchEntity($managerRole, $this->request->data);
            if ($this->ManagerRoles->save($managerRole)) {
                $this->Flash->success(__('The manager role has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The manager role could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('managerRole'));
        $this->set('_serialize', ['managerRole']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Manager Role id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $managerRole = $this->ManagerRoles->get($id);
        if ($this->ManagerRoles->delete($managerRole)) {
            $this->Flash->success(__('The manager role has been deleted.'));
        } else {
            $this->Flash->error(__('The manager role could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
