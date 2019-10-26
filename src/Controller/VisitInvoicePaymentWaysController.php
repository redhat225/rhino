<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * VisitInvoicePaymentWays Controller
 *
 * @property \App\Model\Table\VisitInvoicePaymentWaysTable $VisitInvoicePaymentWays
 */
class VisitInvoicePaymentWaysController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $visitInvoicePaymentWays = $this->paginate($this->VisitInvoicePaymentWays);

        $this->set(compact('visitInvoicePaymentWays'));
        $this->set('_serialize', ['visitInvoicePaymentWays']);
    }

    /**
     * View method
     *
     * @param string|null $id Visit Invoice Payment Way id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $visitInvoicePaymentWay = $this->VisitInvoicePaymentWays->get($id, [
            'contain' => ['VisitInvoices']
        ]);

        $this->set('visitInvoicePaymentWay', $visitInvoicePaymentWay);
        $this->set('_serialize', ['visitInvoicePaymentWay']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $visitInvoicePaymentWay = $this->VisitInvoicePaymentWays->newEntity();
        if ($this->request->is('post')) {
            $visitInvoicePaymentWay = $this->VisitInvoicePaymentWays->patchEntity($visitInvoicePaymentWay, $this->request->data);
            if ($this->VisitInvoicePaymentWays->save($visitInvoicePaymentWay)) {
                $this->Flash->success(__('The visit invoice payment way has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The visit invoice payment way could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('visitInvoicePaymentWay'));
        $this->set('_serialize', ['visitInvoicePaymentWay']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Visit Invoice Payment Way id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $visitInvoicePaymentWay = $this->VisitInvoicePaymentWays->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $visitInvoicePaymentWay = $this->VisitInvoicePaymentWays->patchEntity($visitInvoicePaymentWay, $this->request->data);
            if ($this->VisitInvoicePaymentWays->save($visitInvoicePaymentWay)) {
                $this->Flash->success(__('The visit invoice payment way has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The visit invoice payment way could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('visitInvoicePaymentWay'));
        $this->set('_serialize', ['visitInvoicePaymentWay']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Visit Invoice Payment Way id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $visitInvoicePaymentWay = $this->VisitInvoicePaymentWays->get($id);
        if ($this->VisitInvoicePaymentWays->delete($visitInvoicePaymentWay)) {
            $this->Flash->success(__('The visit invoice payment way has been deleted.'));
        } else {
            $this->Flash->error(__('The visit invoice payment way could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
