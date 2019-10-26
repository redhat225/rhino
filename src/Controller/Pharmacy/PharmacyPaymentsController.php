<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PharmacyPayments Controller
 *
 * @property \App\Model\Table\PharmacyPaymentsTable $PharmacyPayments
 */
class PharmacyPaymentsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['PharmacyPaymentMethods', 'PharmacyInvoices']
        ];
        $pharmacyPayments = $this->paginate($this->PharmacyPayments);

        $this->set(compact('pharmacyPayments'));
        $this->set('_serialize', ['pharmacyPayments']);
    }

    /**
     * View method
     *
     * @param string|null $id Pharmacy Payment id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pharmacyPayment = $this->PharmacyPayments->get($id, [
            'contain' => ['PharmacyPaymentMethods', 'PharmacyInvoices']
        ]);

        $this->set('pharmacyPayment', $pharmacyPayment);
        $this->set('_serialize', ['pharmacyPayment']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pharmacyPayment = $this->PharmacyPayments->newEntity();
        if ($this->request->is('post')) {
            $pharmacyPayment = $this->PharmacyPayments->patchEntity($pharmacyPayment, $this->request->data);
            if ($this->PharmacyPayments->save($pharmacyPayment)) {
                $this->Flash->success(__('The pharmacy payment has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pharmacy payment could not be saved. Please, try again.'));
            }
        }
        $pharmacyPaymentMethods = $this->PharmacyPayments->PharmacyPaymentMethods->find('list', ['limit' => 200]);
        $pharmacyInvoices = $this->PharmacyPayments->PharmacyInvoices->find('list', ['limit' => 200]);
        $this->set(compact('pharmacyPayment', 'pharmacyPaymentMethods', 'pharmacyInvoices'));
        $this->set('_serialize', ['pharmacyPayment']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pharmacy Payment id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pharmacyPayment = $this->PharmacyPayments->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pharmacyPayment = $this->PharmacyPayments->patchEntity($pharmacyPayment, $this->request->data);
            if ($this->PharmacyPayments->save($pharmacyPayment)) {
                $this->Flash->success(__('The pharmacy payment has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pharmacy payment could not be saved. Please, try again.'));
            }
        }
        $pharmacyPaymentMethods = $this->PharmacyPayments->PharmacyPaymentMethods->find('list', ['limit' => 200]);
        $pharmacyInvoices = $this->PharmacyPayments->PharmacyInvoices->find('list', ['limit' => 200]);
        $this->set(compact('pharmacyPayment', 'pharmacyPaymentMethods', 'pharmacyInvoices'));
        $this->set('_serialize', ['pharmacyPayment']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pharmacy Payment id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pharmacyPayment = $this->PharmacyPayments->get($id);
        if ($this->PharmacyPayments->delete($pharmacyPayment)) {
            $this->Flash->success(__('The pharmacy payment has been deleted.'));
        } else {
            $this->Flash->error(__('The pharmacy payment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
