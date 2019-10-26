<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PharmacyStoreProducts Controller
 *
 * @property \App\Model\Table\PharmacyStoreProductsTable $PharmacyStoreProducts
 */
class PharmacyStoreProductsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['PharmacyProducts']
        ];
        $pharmacyStoreProducts = $this->paginate($this->PharmacyStoreProducts);

        $this->set(compact('pharmacyStoreProducts'));
        $this->set('_serialize', ['pharmacyStoreProducts']);
    }

    /**
     * View method
     *
     * @param string|null $id Pharmacy Store Product id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pharmacyStoreProduct = $this->PharmacyStoreProducts->get($id, [
            'contain' => ['PharmacyProducts', 'PharmacyInvoiceDetails', 'PharmacyStoreProductLevels']
        ]);

        $this->set('pharmacyStoreProduct', $pharmacyStoreProduct);
        $this->set('_serialize', ['pharmacyStoreProduct']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pharmacyStoreProduct = $this->PharmacyStoreProducts->newEntity();
        if ($this->request->is('post')) {
            $pharmacyStoreProduct = $this->PharmacyStoreProducts->patchEntity($pharmacyStoreProduct, $this->request->data);
            if ($this->PharmacyStoreProducts->save($pharmacyStoreProduct)) {
                $this->Flash->success(__('The pharmacy store product has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pharmacy store product could not be saved. Please, try again.'));
            }
        }
        $pharmacyProducts = $this->PharmacyStoreProducts->PharmacyProducts->find('list', ['limit' => 200]);
        $this->set(compact('pharmacyStoreProduct', 'pharmacyProducts'));
        $this->set('_serialize', ['pharmacyStoreProduct']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pharmacy Store Product id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pharmacyStoreProduct = $this->PharmacyStoreProducts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pharmacyStoreProduct = $this->PharmacyStoreProducts->patchEntity($pharmacyStoreProduct, $this->request->data);
            if ($this->PharmacyStoreProducts->save($pharmacyStoreProduct)) {
                $this->Flash->success(__('The pharmacy store product has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pharmacy store product could not be saved. Please, try again.'));
            }
        }
        $pharmacyProducts = $this->PharmacyStoreProducts->PharmacyProducts->find('list', ['limit' => 200]);
        $this->set(compact('pharmacyStoreProduct', 'pharmacyProducts'));
        $this->set('_serialize', ['pharmacyStoreProduct']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pharmacy Store Product id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pharmacyStoreProduct = $this->PharmacyStoreProducts->get($id);
        if ($this->PharmacyStoreProducts->delete($pharmacyStoreProduct)) {
            $this->Flash->success(__('The pharmacy store product has been deleted.'));
        } else {
            $this->Flash->error(__('The pharmacy store product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
