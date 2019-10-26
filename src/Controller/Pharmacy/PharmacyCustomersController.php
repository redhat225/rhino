<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PharmacyCustomers Controller
 *
 * @property \App\Model\Table\PharmacyCustomersTable $PharmacyCustomers
 */
class PharmacyCustomersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $pharmacyCustomers = $this->paginate($this->PharmacyCustomers);

        $this->set(compact('pharmacyCustomers'));
        $this->set('_serialize', ['pharmacyCustomers']);
    }

    /**
     * View method
     *
     * @param string|null $id Pharmacy Customer id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pharmacyCustomer = $this->PharmacyCustomers->get($id, [
            'contain' => ['PharmacyInvoices']
        ]);

        $this->set('pharmacyCustomer', $pharmacyCustomer);
        $this->set('_serialize', ['pharmacyCustomer']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pharmacyCustomer = $this->PharmacyCustomers->newEntity();
        if ($this->request->is('post')) {
            $pharmacyCustomer = $this->PharmacyCustomers->patchEntity($pharmacyCustomer, $this->request->data);
            if ($this->PharmacyCustomers->save($pharmacyCustomer)) {
                $this->Flash->success(__('The pharmacy customer has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pharmacy customer could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('pharmacyCustomer'));
        $this->set('_serialize', ['pharmacyCustomer']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pharmacy Customer id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pharmacyCustomer = $this->PharmacyCustomers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pharmacyCustomer = $this->PharmacyCustomers->patchEntity($pharmacyCustomer, $this->request->data);
            if ($this->PharmacyCustomers->save($pharmacyCustomer)) {
                $this->Flash->success(__('The pharmacy customer has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pharmacy customer could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('pharmacyCustomer'));
        $this->set('_serialize', ['pharmacyCustomer']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pharmacy Customer id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pharmacyCustomer = $this->PharmacyCustomers->get($id);
        if ($this->PharmacyCustomers->delete($pharmacyCustomer)) {
            $this->Flash->success(__('The pharmacy customer has been deleted.'));
        } else {
            $this->Flash->error(__('The pharmacy customer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
