<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PharmacyOperators Controller
 *
 * @property \App\Model\Table\PharmacyOperatorsTable $PharmacyOperators
 */
class PharmacyOperatorsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['People', 'PharmacyInstitutions', 'PharmacyRoles']
        ];
        $pharmacyOperators = $this->paginate($this->PharmacyOperators);

        $this->set(compact('pharmacyOperators'));
        $this->set('_serialize', ['pharmacyOperators']);
    }

    /**
     * View method
     *
     * @param string|null $id Pharmacy Operator id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pharmacyOperator = $this->PharmacyOperators->get($id, [
            'contain' => ['People', 'PharmacyInstitutions', 'PharmacyRoles', 'PharmacyInvoices']
        ]);

        $this->set('pharmacyOperator', $pharmacyOperator);
        $this->set('_serialize', ['pharmacyOperator']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pharmacyOperator = $this->PharmacyOperators->newEntity();
        if ($this->request->is('post')) {
            $pharmacyOperator = $this->PharmacyOperators->patchEntity($pharmacyOperator, $this->request->data);
            if ($this->PharmacyOperators->save($pharmacyOperator)) {
                $this->Flash->success(__('The pharmacy operator has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pharmacy operator could not be saved. Please, try again.'));
            }
        }
        $people = $this->PharmacyOperators->People->find('list', ['limit' => 200]);
        $pharmacyInstitutions = $this->PharmacyOperators->PharmacyInstitutions->find('list', ['limit' => 200]);
        $pharmacyRoles = $this->PharmacyOperators->PharmacyRoles->find('list', ['limit' => 200]);
        $this->set(compact('pharmacyOperator', 'people', 'pharmacyInstitutions', 'pharmacyRoles'));
        $this->set('_serialize', ['pharmacyOperator']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pharmacy Operator id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pharmacyOperator = $this->PharmacyOperators->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pharmacyOperator = $this->PharmacyOperators->patchEntity($pharmacyOperator, $this->request->data);
            if ($this->PharmacyOperators->save($pharmacyOperator)) {
                $this->Flash->success(__('The pharmacy operator has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pharmacy operator could not be saved. Please, try again.'));
            }
        }
        $people = $this->PharmacyOperators->People->find('list', ['limit' => 200]);
        $pharmacyInstitutions = $this->PharmacyOperators->PharmacyInstitutions->find('list', ['limit' => 200]);
        $pharmacyRoles = $this->PharmacyOperators->PharmacyRoles->find('list', ['limit' => 200]);
        $this->set(compact('pharmacyOperator', 'people', 'pharmacyInstitutions', 'pharmacyRoles'));
        $this->set('_serialize', ['pharmacyOperator']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pharmacy Operator id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pharmacyOperator = $this->PharmacyOperators->get($id);
        if ($this->PharmacyOperators->delete($pharmacyOperator)) {
            $this->Flash->success(__('The pharmacy operator has been deleted.'));
        } else {
            $this->Flash->error(__('The pharmacy operator could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
