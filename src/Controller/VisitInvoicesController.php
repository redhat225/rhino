<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * VisitInvoices Controller
 *
 * @property \App\Model\Table\VisitInvoicesTable $VisitInvoices
 */
class VisitInvoicesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Visits', 'VisitInvoiceTypes', 'ManagerOperators']
        ];
        $visitInvoices = $this->paginate($this->VisitInvoices);

        $this->set(compact('visitInvoices'));
        $this->set('_serialize', ['visitInvoices']);
    }

    /**
     * View method
     *
     * @param string|null $id Visit Invoice id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $visitInvoice = $this->VisitInvoices->get($id, [
            'contain' => ['Visits', 'VisitInvoiceTypes', 'ManagerOperators', 'VisitInvoiceDetails', 'VisitInvoicePayments']
        ]);

        $this->set('visitInvoice', $visitInvoice);
        $this->set('_serialize', ['visitInvoice']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $visitInvoice = $this->VisitInvoices->newEntity();
        if ($this->request->is('post')) {
            $visitInvoice = $this->VisitInvoices->patchEntity($visitInvoice, $this->request->data);
            if ($this->VisitInvoices->save($visitInvoice)) {
                $this->Flash->success(__('The visit invoice has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The visit invoice could not be saved. Please, try again.'));
            }
        }
        $visits = $this->VisitInvoices->Visits->find('list', ['limit' => 200]);
        $visitInvoiceTypes = $this->VisitInvoices->VisitInvoiceTypes->find('list', ['limit' => 200]);
        $managerOperators = $this->VisitInvoices->ManagerOperators->find('list', ['limit' => 200]);
        $this->set(compact('visitInvoice', 'visits', 'visitInvoiceTypes', 'managerOperators'));
        $this->set('_serialize', ['visitInvoice']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Visit Invoice id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $visitInvoice = $this->VisitInvoices->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $visitInvoice = $this->VisitInvoices->patchEntity($visitInvoice, $this->request->data);
            if ($this->VisitInvoices->save($visitInvoice)) {
                $this->Flash->success(__('The visit invoice has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The visit invoice could not be saved. Please, try again.'));
            }
        }
        $visits = $this->VisitInvoices->Visits->find('list', ['limit' => 200]);
        $visitInvoiceTypes = $this->VisitInvoices->VisitInvoiceTypes->find('list', ['limit' => 200]);
        $managerOperators = $this->VisitInvoices->ManagerOperators->find('list', ['limit' => 200]);
        $this->set(compact('visitInvoice', 'visits', 'visitInvoiceTypes', 'managerOperators'));
        $this->set('_serialize', ['visitInvoice']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Visit Invoice id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $visitInvoice = $this->VisitInvoices->get($id);
        if ($this->VisitInvoices->delete($visitInvoice)) {
            $this->Flash->success(__('The visit invoice has been deleted.'));
        } else {
            $this->Flash->error(__('The visit invoice could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
