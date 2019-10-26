<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * VisitInvoiceDetails Controller
 *
 * @property \App\Model\Table\VisitInvoiceDetailsTable $VisitInvoiceDetails
 */
class VisitInvoiceDetailsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['VisitInvoices', 'VisitInvoiceItems']
        ];
        $visitInvoiceDetails = $this->paginate($this->VisitInvoiceDetails);

        $this->set(compact('visitInvoiceDetails'));
        $this->set('_serialize', ['visitInvoiceDetails']);
    }

    /**
     * View method
     *
     * @param string|null $id Visit Invoice Detail id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $visitInvoiceDetail = $this->VisitInvoiceDetails->get($id, [
            'contain' => ['VisitInvoices', 'VisitInvoiceItems']
        ]);

        $this->set('visitInvoiceDetail', $visitInvoiceDetail);
        $this->set('_serialize', ['visitInvoiceDetail']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $visitInvoiceDetail = $this->VisitInvoiceDetails->newEntity();
        if ($this->request->is('post')) {
            $visitInvoiceDetail = $this->VisitInvoiceDetails->patchEntity($visitInvoiceDetail, $this->request->data);
            if ($this->VisitInvoiceDetails->save($visitInvoiceDetail)) {
                $this->Flash->success(__('The visit invoice detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The visit invoice detail could not be saved. Please, try again.'));
            }
        }
        $visitInvoices = $this->VisitInvoiceDetails->VisitInvoices->find('list', ['limit' => 200]);
        $visitInvoiceItems = $this->VisitInvoiceDetails->VisitInvoiceItems->find('list', ['limit' => 200]);
        $this->set(compact('visitInvoiceDetail', 'visitInvoices', 'visitInvoiceItems'));
        $this->set('_serialize', ['visitInvoiceDetail']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Visit Invoice Detail id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $visitInvoiceDetail = $this->VisitInvoiceDetails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $visitInvoiceDetail = $this->VisitInvoiceDetails->patchEntity($visitInvoiceDetail, $this->request->data);
            if ($this->VisitInvoiceDetails->save($visitInvoiceDetail)) {
                $this->Flash->success(__('The visit invoice detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The visit invoice detail could not be saved. Please, try again.'));
            }
        }
        $visitInvoices = $this->VisitInvoiceDetails->VisitInvoices->find('list', ['limit' => 200]);
        $visitInvoiceItems = $this->VisitInvoiceDetails->VisitInvoiceItems->find('list', ['limit' => 200]);
        $this->set(compact('visitInvoiceDetail', 'visitInvoices', 'visitInvoiceItems'));
        $this->set('_serialize', ['visitInvoiceDetail']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Visit Invoice Detail id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $visitInvoiceDetail = $this->VisitInvoiceDetails->get($id);
        if ($this->VisitInvoiceDetails->delete($visitInvoiceDetail)) {
            $this->Flash->success(__('The visit invoice detail has been deleted.'));
        } else {
            $this->Flash->error(__('The visit invoice detail could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
