<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * VisitInvoiceTypes Controller
 *
 * @property \App\Model\Table\VisitInvoiceTypesTable $VisitInvoiceTypes
 */
class VisitInvoiceTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $visitInvoiceTypes = $this->paginate($this->VisitInvoiceTypes);

        $this->set(compact('visitInvoiceTypes'));
        $this->set('_serialize', ['visitInvoiceTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Visit Invoice Type id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $visitInvoiceType = $this->VisitInvoiceTypes->get($id, [
            'contain' => ['VisitInvoices']
        ]);

        $this->set('visitInvoiceType', $visitInvoiceType);
        $this->set('_serialize', ['visitInvoiceType']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $visitInvoiceType = $this->VisitInvoiceTypes->newEntity();
        if ($this->request->is('post')) {
            $visitInvoiceType = $this->VisitInvoiceTypes->patchEntity($visitInvoiceType, $this->request->data);
            if ($this->VisitInvoiceTypes->save($visitInvoiceType)) {
                $this->Flash->success(__('The visit invoice type has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The visit invoice type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('visitInvoiceType'));
        $this->set('_serialize', ['visitInvoiceType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Visit Invoice Type id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $visitInvoiceType = $this->VisitInvoiceTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $visitInvoiceType = $this->VisitInvoiceTypes->patchEntity($visitInvoiceType, $this->request->data);
            if ($this->VisitInvoiceTypes->save($visitInvoiceType)) {
                $this->Flash->success(__('The visit invoice type has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The visit invoice type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('visitInvoiceType'));
        $this->set('_serialize', ['visitInvoiceType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Visit Invoice Type id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $visitInvoiceType = $this->VisitInvoiceTypes->get($id);
        if ($this->VisitInvoiceTypes->delete($visitInvoiceType)) {
            $this->Flash->success(__('The visit invoice type has been deleted.'));
        } else {
            $this->Flash->error(__('The visit invoice type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
