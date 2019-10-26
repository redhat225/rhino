<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AuxiliaryRoleDetails Controller
 *
 * @property \App\Model\Table\AuxiliaryRoleDetailsTable $AuxiliaryRoleDetails
 */
class AuxiliaryRoleDetailsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Auxiliaries', 'AuxiliaryRoles']
        ];
        $auxiliaryRoleDetails = $this->paginate($this->AuxiliaryRoleDetails);

        $this->set(compact('auxiliaryRoleDetails'));
        $this->set('_serialize', ['auxiliaryRoleDetails']);
    }

    /**
     * View method
     *
     * @param string|null $id Auxiliary Role Detail id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $auxiliaryRoleDetail = $this->AuxiliaryRoleDetails->get($id, [
            'contain' => ['Auxiliaries', 'AuxiliaryRoles']
        ]);

        $this->set('auxiliaryRoleDetail', $auxiliaryRoleDetail);
        $this->set('_serialize', ['auxiliaryRoleDetail']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $auxiliaryRoleDetail = $this->AuxiliaryRoleDetails->newEntity();
        if ($this->request->is('post')) {
            $auxiliaryRoleDetail = $this->AuxiliaryRoleDetails->patchEntity($auxiliaryRoleDetail, $this->request->data);
            if ($this->AuxiliaryRoleDetails->save($auxiliaryRoleDetail)) {
                $this->Flash->success(__('The auxiliary role detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The auxiliary role detail could not be saved. Please, try again.'));
            }
        }
        $auxiliaries = $this->AuxiliaryRoleDetails->Auxiliaries->find('list', ['limit' => 200]);
        $auxiliaryRoles = $this->AuxiliaryRoleDetails->AuxiliaryRoles->find('list', ['limit' => 200]);
        $this->set(compact('auxiliaryRoleDetail', 'auxiliaries', 'auxiliaryRoles'));
        $this->set('_serialize', ['auxiliaryRoleDetail']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Auxiliary Role Detail id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $auxiliaryRoleDetail = $this->AuxiliaryRoleDetails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $auxiliaryRoleDetail = $this->AuxiliaryRoleDetails->patchEntity($auxiliaryRoleDetail, $this->request->data);
            if ($this->AuxiliaryRoleDetails->save($auxiliaryRoleDetail)) {
                $this->Flash->success(__('The auxiliary role detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The auxiliary role detail could not be saved. Please, try again.'));
            }
        }
        $auxiliaries = $this->AuxiliaryRoleDetails->Auxiliaries->find('list', ['limit' => 200]);
        $auxiliaryRoles = $this->AuxiliaryRoleDetails->AuxiliaryRoles->find('list', ['limit' => 200]);
        $this->set(compact('auxiliaryRoleDetail', 'auxiliaries', 'auxiliaryRoles'));
        $this->set('_serialize', ['auxiliaryRoleDetail']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Auxiliary Role Detail id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $auxiliaryRoleDetail = $this->AuxiliaryRoleDetails->get($id);
        if ($this->AuxiliaryRoleDetails->delete($auxiliaryRoleDetail)) {
            $this->Flash->success(__('The auxiliary role detail has been deleted.'));
        } else {
            $this->Flash->error(__('The auxiliary role detail could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
