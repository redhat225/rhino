<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * VisitInvoicePaymentSchedules Controller
 *
 * @property \App\Model\Table\VisitInvoicePaymentSchedulesTable $VisitInvoicePaymentSchedules
 */
class VisitInvoicePaymentSchedulesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['VisitInvoicePayments']
        ];
        $visitInvoicePaymentSchedules = $this->paginate($this->VisitInvoicePaymentSchedules);

        $this->set(compact('visitInvoicePaymentSchedules'));
        $this->set('_serialize', ['visitInvoicePaymentSchedules']);
    }

    /**
     * View method
     *
     * @param string|null $id Visit Invoice Payment Schedule id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $visitInvoicePaymentSchedule = $this->VisitInvoicePaymentSchedules->get($id, [
            'contain' => ['VisitInvoicePayments']
        ]);

        $this->set('visitInvoicePaymentSchedule', $visitInvoicePaymentSchedule);
        $this->set('_serialize', ['visitInvoicePaymentSchedule']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $visitInvoicePaymentSchedule = $this->VisitInvoicePaymentSchedules->newEntity();
        if ($this->request->is('post')) {
            $visitInvoicePaymentSchedule = $this->VisitInvoicePaymentSchedules->patchEntity($visitInvoicePaymentSchedule, $this->request->data);
            if ($this->VisitInvoicePaymentSchedules->save($visitInvoicePaymentSchedule)) {
                $this->Flash->success(__('The visit invoice payment schedule has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The visit invoice payment schedule could not be saved. Please, try again.'));
            }
        }
        $visitInvoicePayments = $this->VisitInvoicePaymentSchedules->VisitInvoicePayments->find('list', ['limit' => 200]);
        $this->set(compact('visitInvoicePaymentSchedule', 'visitInvoicePayments'));
        $this->set('_serialize', ['visitInvoicePaymentSchedule']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Visit Invoice Payment Schedule id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $visitInvoicePaymentSchedule = $this->VisitInvoicePaymentSchedules->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $visitInvoicePaymentSchedule = $this->VisitInvoicePaymentSchedules->patchEntity($visitInvoicePaymentSchedule, $this->request->data);
            if ($this->VisitInvoicePaymentSchedules->save($visitInvoicePaymentSchedule)) {
                $this->Flash->success(__('The visit invoice payment schedule has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The visit invoice payment schedule could not be saved. Please, try again.'));
            }
        }
        $visitInvoicePayments = $this->VisitInvoicePaymentSchedules->VisitInvoicePayments->find('list', ['limit' => 200]);
        $this->set(compact('visitInvoicePaymentSchedule', 'visitInvoicePayments'));
        $this->set('_serialize', ['visitInvoicePaymentSchedule']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Visit Invoice Payment Schedule id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $visitInvoicePaymentSchedule = $this->VisitInvoicePaymentSchedules->get($id);
        if ($this->VisitInvoicePaymentSchedules->delete($visitInvoicePaymentSchedule)) {
            $this->Flash->success(__('The visit invoice payment schedule has been deleted.'));
        } else {
            $this->Flash->error(__('The visit invoice payment schedule could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
