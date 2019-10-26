<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * VisitInvoiceItemCategories Controller
 *
 * @property \App\Model\Table\VisitInvoiceItemCategoriesTable $VisitInvoiceItemCategories
 */
class VisitInvoiceItemCategoriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $visitInvoiceItemCategories = $this->paginate($this->VisitInvoiceItemCategories);

        $this->set(compact('visitInvoiceItemCategories'));
        $this->set('_serialize', ['visitInvoiceItemCategories']);
    }

    /**
     * View method
     *
     * @param string|null $id Visit Invoice Item Category id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $visitInvoiceItemCategory = $this->VisitInvoiceItemCategories->get($id, [
            'contain' => ['VisitInvoiceItems']
        ]);

        $this->set('visitInvoiceItemCategory', $visitInvoiceItemCategory);
        $this->set('_serialize', ['visitInvoiceItemCategory']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $visitInvoiceItemCategory = $this->VisitInvoiceItemCategories->newEntity();
        if ($this->request->is('post')) {
            $visitInvoiceItemCategory = $this->VisitInvoiceItemCategories->patchEntity($visitInvoiceItemCategory, $this->request->data);
            if ($this->VisitInvoiceItemCategories->save($visitInvoiceItemCategory)) {
                $this->Flash->success(__('The visit invoice item category has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The visit invoice item category could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('visitInvoiceItemCategory'));
        $this->set('_serialize', ['visitInvoiceItemCategory']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Visit Invoice Item Category id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $visitInvoiceItemCategory = $this->VisitInvoiceItemCategories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $visitInvoiceItemCategory = $this->VisitInvoiceItemCategories->patchEntity($visitInvoiceItemCategory, $this->request->data);
            if ($this->VisitInvoiceItemCategories->save($visitInvoiceItemCategory)) {
                $this->Flash->success(__('The visit invoice item category has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The visit invoice item category could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('visitInvoiceItemCategory'));
        $this->set('_serialize', ['visitInvoiceItemCategory']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Visit Invoice Item Category id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $visitInvoiceItemCategory = $this->VisitInvoiceItemCategories->get($id);
        if ($this->VisitInvoiceItemCategories->delete($visitInvoiceItemCategory)) {
            $this->Flash->success(__('The visit invoice item category has been deleted.'));
        } else {
            $this->Flash->error(__('The visit invoice item category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
