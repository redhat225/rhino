<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PharmacyProducts Controller
 *
 * @property \App\Model\Table\PharmacyProductsTable $PharmacyProducts
 */
class PharmacyProductsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['PharmacyProductCategories', 'PharmacyInstitutions']
        ];
        $pharmacyProducts = $this->paginate($this->PharmacyProducts);

        $this->set(compact('pharmacyProducts'));
        $this->set('_serialize', ['pharmacyProducts']);
    }

    /**
     * View method
     *
     * @param string|null $id Pharmacy Product id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pharmacyProduct = $this->PharmacyProducts->get($id, [
            'contain' => ['PharmacyProductCategories', 'PharmacyInstitutions', 'PharmacyProductPrices', 'PharmacyStoreProducts']
        ]);

        $this->set('pharmacyProduct', $pharmacyProduct);
        $this->set('_serialize', ['pharmacyProduct']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pharmacyProduct = $this->PharmacyProducts->newEntity();
        if ($this->request->is('post')) {
            $pharmacyProduct = $this->PharmacyProducts->patchEntity($pharmacyProduct, $this->request->data);
            if ($this->PharmacyProducts->save($pharmacyProduct)) {
                $this->Flash->success(__('The pharmacy product has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pharmacy product could not be saved. Please, try again.'));
            }
        }
        $pharmacyProductCategories = $this->PharmacyProducts->PharmacyProductCategories->find('list', ['limit' => 200]);
        $pharmacyInstitutions = $this->PharmacyProducts->PharmacyInstitutions->find('list', ['limit' => 200]);
        $this->set(compact('pharmacyProduct', 'pharmacyProductCategories', 'pharmacyInstitutions'));
        $this->set('_serialize', ['pharmacyProduct']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pharmacy Product id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pharmacyProduct = $this->PharmacyProducts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pharmacyProduct = $this->PharmacyProducts->patchEntity($pharmacyProduct, $this->request->data);
            if ($this->PharmacyProducts->save($pharmacyProduct)) {
                $this->Flash->success(__('The pharmacy product has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pharmacy product could not be saved. Please, try again.'));
            }
        }
        $pharmacyProductCategories = $this->PharmacyProducts->PharmacyProductCategories->find('list', ['limit' => 200]);
        $pharmacyInstitutions = $this->PharmacyProducts->PharmacyInstitutions->find('list', ['limit' => 200]);
        $this->set(compact('pharmacyProduct', 'pharmacyProductCategories', 'pharmacyInstitutions'));
        $this->set('_serialize', ['pharmacyProduct']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pharmacy Product id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pharmacyProduct = $this->PharmacyProducts->get($id);
        if ($this->PharmacyProducts->delete($pharmacyProduct)) {
            $this->Flash->success(__('The pharmacy product has been deleted.'));
        } else {
            $this->Flash->error(__('The pharmacy product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
