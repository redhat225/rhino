<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * VisitInvoicePayments Controller
 *
 * @property \App\Model\Table\VisitInvoicePaymentsTable $VisitInvoicePayments
 */
class VisitInvoicePaymentsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['VisitInvoices', 'VisitInvoicePaymentMethods']
        ];
        $visitInvoicePayments = $this->paginate($this->VisitInvoicePayments);

        $this->set(compact('visitInvoicePayments'));
        $this->set('_serialize', ['visitInvoicePayments']);
    }

    /**
     * View method
     *
     * @param string|null $id Visit Invoice Payment id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $visitInvoicePayment = $this->VisitInvoicePayments->get($id, [
            'contain' => ['VisitInvoices', 'VisitInvoicePaymentMethods']
        ]);

        $this->set('visitInvoicePayment', $visitInvoicePayment);
        $this->set('_serialize', ['visitInvoicePayment']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $visitInvoicePayment = $this->VisitInvoicePayments->newEntity();
        if ($this->request->is('post')) {
            $visitInvoicePayment = $this->VisitInvoicePayments->patchEntity($visitInvoicePayment, $this->request->data);
            if ($this->VisitInvoicePayments->save($visitInvoicePayment)) {
                $this->Flash->success(__('The visit invoice payment has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The visit invoice payment could not be saved. Please, try again.'));
            }
        }
        $visitInvoices = $this->VisitInvoicePayments->VisitInvoices->find('list', ['limit' => 200]);
        $visitInvoicePaymentMethods = $this->VisitInvoicePayments->VisitInvoicePaymentMethods->find('list', ['limit' => 200]);
        $this->set(compact('visitInvoicePayment', 'visitInvoices', 'visitInvoicePaymentMethods'));
        $this->set('_serialize', ['visitInvoicePayment']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Visit Invoice Payment id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $visitInvoicePayment = $this->VisitInvoicePayments->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $visitInvoicePayment = $this->VisitInvoicePayments->patchEntity($visitInvoicePayment, $this->request->data);
            if ($this->VisitInvoicePayments->save($visitInvoicePayment)) {
                $this->Flash->success(__('The visit invoice payment has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The visit invoice payment could not be saved. Please, try again.'));
            }
        }
        $visitInvoices = $this->VisitInvoicePayments->VisitInvoices->find('list', ['limit' => 200]);
        $visitInvoicePaymentMethods = $this->VisitInvoicePayments->VisitInvoicePaymentMethods->find('list', ['limit' => 200]);
        $this->set(compact('visitInvoicePayment', 'visitInvoices', 'visitInvoicePaymentMethods'));
        $this->set('_serialize', ['visitInvoicePayment']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Visit Invoice Payment id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $visitInvoicePayment = $this->VisitInvoicePayments->get($id);
        if ($this->VisitInvoicePayments->delete($visitInvoicePayment)) {
            $this->Flash->success(__('The visit invoice payment has been deleted.'));
        } else {
            $this->Flash->error(__('The visit invoice payment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
