<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * VisitInvoicePaymentMethods Controller
 *
 * @property \App\Model\Table\VisitInvoicePaymentMethodsTable $VisitInvoicePaymentMethods
 */
class VisitInvoicePaymentMethodsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $visitInvoicePaymentMethods = $this->paginate($this->VisitInvoicePaymentMethods);

        $this->set(compact('visitInvoicePaymentMethods'));
        $this->set('_serialize', ['visitInvoicePaymentMethods']);
    }

    /**
     * View method
     *
     * @param string|null $id Visit Invoice Payment Method id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $visitInvoicePaymentMethod = $this->VisitInvoicePaymentMethods->get($id, [
            'contain' => ['VisitInvoices']
        ]);

        $this->set('visitInvoicePaymentMethod', $visitInvoicePaymentMethod);
        $this->set('_serialize', ['visitInvoicePaymentMethod']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $visitInvoicePaymentMethod = $this->VisitInvoicePaymentMethods->newEntity();
        if ($this->request->is('post')) {
            $visitInvoicePaymentMethod = $this->VisitInvoicePaymentMethods->patchEntity($visitInvoicePaymentMethod, $this->request->data);
            if ($this->VisitInvoicePaymentMethods->save($visitInvoicePaymentMethod)) {
                $this->Flash->success(__('The visit invoice payment method has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The visit invoice payment method could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('visitInvoicePaymentMethod'));
        $this->set('_serialize', ['visitInvoicePaymentMethod']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Visit Invoice Payment Method id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $visitInvoicePaymentMethod = $this->VisitInvoicePaymentMethods->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $visitInvoicePaymentMethod = $this->VisitInvoicePaymentMethods->patchEntity($visitInvoicePaymentMethod, $this->request->data);
            if ($this->VisitInvoicePaymentMethods->save($visitInvoicePaymentMethod)) {
                $this->Flash->success(__('The visit invoice payment method has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The visit invoice payment method could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('visitInvoicePaymentMethod'));
        $this->set('_serialize', ['visitInvoicePaymentMethod']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Visit Invoice Payment Method id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $visitInvoicePaymentMethod = $this->VisitInvoicePaymentMethods->get($id);
        if ($this->VisitInvoicePaymentMethods->delete($visitInvoicePaymentMethod)) {
            $this->Flash->success(__('The visit invoice payment method has been deleted.'));
        } else {
            $this->Flash->error(__('The visit invoice payment method could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
