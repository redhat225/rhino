<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PharmacyInvoices Controller
 *
 * @property \App\Model\Table\PharmacyInvoicesTable $PharmacyInvoices
 */
class PharmacyInvoicesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['PharmacyOperators', 'PharmacyCustomers']
        ];
        $pharmacyInvoices = $this->paginate($this->PharmacyInvoices);

        $this->set(compact('pharmacyInvoices'));
        $this->set('_serialize', ['pharmacyInvoices']);
    }

    /**
     * View method
     *
     * @param string|null $id Pharmacy Invoice id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pharmacyInvoice = $this->PharmacyInvoices->get($id, [
            'contain' => ['PharmacyOperators', 'PharmacyCustomers', 'PharmacyInvoiceDetails', 'PharmacyPayments']
        ]);

        $this->set('pharmacyInvoice', $pharmacyInvoice);
        $this->set('_serialize', ['pharmacyInvoice']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pharmacyInvoice = $this->PharmacyInvoices->newEntity();
        if ($this->request->is('post')) {
            $pharmacyInvoice = $this->PharmacyInvoices->patchEntity($pharmacyInvoice, $this->request->data);
            if ($this->PharmacyInvoices->save($pharmacyInvoice)) {
                $this->Flash->success(__('The pharmacy invoice has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pharmacy invoice could not be saved. Please, try again.'));
            }
        }
        $pharmacyOperators = $this->PharmacyInvoices->PharmacyOperators->find('list', ['limit' => 200]);
        $pharmacyCustomers = $this->PharmacyInvoices->PharmacyCustomers->find('list', ['limit' => 200]);
        $this->set(compact('pharmacyInvoice', 'pharmacyOperators', 'pharmacyCustomers'));
        $this->set('_serialize', ['pharmacyInvoice']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pharmacy Invoice id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pharmacyInvoice = $this->PharmacyInvoices->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pharmacyInvoice = $this->PharmacyInvoices->patchEntity($pharmacyInvoice, $this->request->data);
            if ($this->PharmacyInvoices->save($pharmacyInvoice)) {
                $this->Flash->success(__('The pharmacy invoice has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pharmacy invoice could not be saved. Please, try again.'));
            }
        }
        $pharmacyOperators = $this->PharmacyInvoices->PharmacyOperators->find('list', ['limit' => 200]);
        $pharmacyCustomers = $this->PharmacyInvoices->PharmacyCustomers->find('list', ['limit' => 200]);
        $this->set(compact('pharmacyInvoice', 'pharmacyOperators', 'pharmacyCustomers'));
        $this->set('_serialize', ['pharmacyInvoice']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pharmacy Invoice id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pharmacyInvoice = $this->PharmacyInvoices->get($id);
        if ($this->PharmacyInvoices->delete($pharmacyInvoice)) {
            $this->Flash->success(__('The pharmacy invoice has been deleted.'));
        } else {
            $this->Flash->error(__('The pharmacy invoice could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
