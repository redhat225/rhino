<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PharmacyRoles Controller
 *
 * @property \App\Model\Table\PharmacyRolesTable $PharmacyRoles
 */
class PharmacyRolesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $pharmacyRoles = $this->paginate($this->PharmacyRoles);

        $this->set(compact('pharmacyRoles'));
        $this->set('_serialize', ['pharmacyRoles']);
    }

    /**
     * View method
     *
     * @param string|null $id Pharmacy Role id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pharmacyRole = $this->PharmacyRoles->get($id, [
            'contain' => ['PharmacyOperators']
        ]);

        $this->set('pharmacyRole', $pharmacyRole);
        $this->set('_serialize', ['pharmacyRole']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pharmacyRole = $this->PharmacyRoles->newEntity();
        if ($this->request->is('post')) {
            $pharmacyRole = $this->PharmacyRoles->patchEntity($pharmacyRole, $this->request->data);
            if ($this->PharmacyRoles->save($pharmacyRole)) {
                $this->Flash->success(__('The pharmacy role has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pharmacy role could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('pharmacyRole'));
        $this->set('_serialize', ['pharmacyRole']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pharmacy Role id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pharmacyRole = $this->PharmacyRoles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pharmacyRole = $this->PharmacyRoles->patchEntity($pharmacyRole, $this->request->data);
            if ($this->PharmacyRoles->save($pharmacyRole)) {
                $this->Flash->success(__('The pharmacy role has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pharmacy role could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('pharmacyRole'));
        $this->set('_serialize', ['pharmacyRole']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pharmacy Role id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pharmacyRole = $this->PharmacyRoles->get($id);
        if ($this->PharmacyRoles->delete($pharmacyRole)) {
            $this->Flash->success(__('The pharmacy role has been deleted.'));
        } else {
            $this->Flash->error(__('The pharmacy role could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
