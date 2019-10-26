<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * VisitInvoiceItems Controller
 *
 * @property \App\Model\Table\VisitInvoiceItemsTable $VisitInvoiceItems
 */
class VisitInvoiceItemsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['VisitInvoiceItemCategories', 'Institutions']
        ];
        $visitInvoiceItems = $this->paginate($this->VisitInvoiceItems);

        $this->set(compact('visitInvoiceItems'));
        $this->set('_serialize', ['visitInvoiceItems']);
    }

    /**
     * View method
     *
     * @param string|null $id Visit Invoice Item id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $visitInvoiceItem = $this->VisitInvoiceItems->get($id, [
            'contain' => ['VisitInvoiceItemCategories', 'Institutions', 'VisitInvoices']
        ]);

        $this->set('visitInvoiceItem', $visitInvoiceItem);
        $this->set('_serialize', ['visitInvoiceItem']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $visitInvoiceItem = $this->VisitInvoiceItems->newEntity();
        if ($this->request->is('post')) {
            $visitInvoiceItem = $this->VisitInvoiceItems->patchEntity($visitInvoiceItem, $this->request->data);
            if ($this->VisitInvoiceItems->save($visitInvoiceItem)) {
                $this->Flash->success(__('The visit invoice item has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The visit invoice item could not be saved. Please, try again.'));
            }
        }
        $visitInvoiceItemCategories = $this->VisitInvoiceItems->VisitInvoiceItemCategories->find('list', ['limit' => 200]);
        $institutions = $this->VisitInvoiceItems->Institutions->find('list', ['limit' => 200]);
        $visitInvoices = $this->VisitInvoiceItems->VisitInvoices->find('list', ['limit' => 200]);
        $this->set(compact('visitInvoiceItem', 'visitInvoiceItemCategories', 'institutions', 'visitInvoices'));
        $this->set('_serialize', ['visitInvoiceItem']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Visit Invoice Item id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $visitInvoiceItem = $this->VisitInvoiceItems->get($id, [
            'contain' => ['VisitInvoices']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $visitInvoiceItem = $this->VisitInvoiceItems->patchEntity($visitInvoiceItem, $this->request->data);
            if ($this->VisitInvoiceItems->save($visitInvoiceItem)) {
                $this->Flash->success(__('The visit invoice item has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The visit invoice item could not be saved. Please, try again.'));
            }
        }
        $visitInvoiceItemCategories = $this->VisitInvoiceItems->VisitInvoiceItemCategories->find('list', ['limit' => 200]);
        $institutions = $this->VisitInvoiceItems->Institutions->find('list', ['limit' => 200]);
        $visitInvoices = $this->VisitInvoiceItems->VisitInvoices->find('list', ['limit' => 200]);
        $this->set(compact('visitInvoiceItem', 'visitInvoiceItemCategories', 'institutions', 'visitInvoices'));
        $this->set('_serialize', ['visitInvoiceItem']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Visit Invoice Item id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $visitInvoiceItem = $this->VisitInvoiceItems->get($id);
        if ($this->VisitInvoiceItems->delete($visitInvoiceItem)) {
            $this->Flash->success(__('The visit invoice item has been deleted.'));
        } else {
            $this->Flash->error(__('The visit invoice item could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
