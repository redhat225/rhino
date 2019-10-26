<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AuxiliaryRoles Controller
 *
 * @property \App\Model\Table\AuxiliaryRolesTable $AuxiliaryRoles
 */
class AuxiliaryRolesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $auxiliaryRoles = $this->paginate($this->AuxiliaryRoles);

        $this->set(compact('auxiliaryRoles'));
        $this->set('_serialize', ['auxiliaryRoles']);
    }

    /**
     * View method
     *
     * @param string|null $id Auxiliary Role id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $auxiliaryRole = $this->AuxiliaryRoles->get($id, [
            'contain' => ['AuxiliaryRoleDetails']
        ]);

        $this->set('auxiliaryRole', $auxiliaryRole);
        $this->set('_serialize', ['auxiliaryRole']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $auxiliaryRole = $this->AuxiliaryRoles->newEntity();
        if ($this->request->is('post')) {
            $auxiliaryRole = $this->AuxiliaryRoles->patchEntity($auxiliaryRole, $this->request->data);
            if ($this->AuxiliaryRoles->save($auxiliaryRole)) {
                $this->Flash->success(__('The auxiliary role has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The auxiliary role could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('auxiliaryRole'));
        $this->set('_serialize', ['auxiliaryRole']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Auxiliary Role id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $auxiliaryRole = $this->AuxiliaryRoles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $auxiliaryRole = $this->AuxiliaryRoles->patchEntity($auxiliaryRole, $this->request->data);
            if ($this->AuxiliaryRoles->save($auxiliaryRole)) {
                $this->Flash->success(__('The auxiliary role has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The auxiliary role could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('auxiliaryRole'));
        $this->set('_serialize', ['auxiliaryRole']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Auxiliary Role id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $auxiliaryRole = $this->AuxiliaryRoles->get($id);
        if ($this->AuxiliaryRoles->delete($auxiliaryRole)) {
            $this->Flash->success(__('The auxiliary role has been deleted.'));
        } else {
            $this->Flash->error(__('The auxiliary role could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
