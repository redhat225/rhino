<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PharmacyProductPrices Controller
 *
 * @property \App\Model\Table\PharmacyProductPricesTable $PharmacyProductPrices
 */
class PharmacyProductPricesController extends AppController
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
        $pharmacyProductPrices = $this->paginate($this->PharmacyProductPrices);

        $this->set(compact('pharmacyProductPrices'));
        $this->set('_serialize', ['pharmacyProductPrices']);
    }

    /**
     * View method
     *
     * @param string|null $id Pharmacy Product Price id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pharmacyProductPrice = $this->PharmacyProductPrices->get($id, [
            'contain' => ['PharmacyProducts']
        ]);

        $this->set('pharmacyProductPrice', $pharmacyProductPrice);
        $this->set('_serialize', ['pharmacyProductPrice']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pharmacyProductPrice = $this->PharmacyProductPrices->newEntity();
        if ($this->request->is('post')) {
            $pharmacyProductPrice = $this->PharmacyProductPrices->patchEntity($pharmacyProductPrice, $this->request->data);
            if ($this->PharmacyProductPrices->save($pharmacyProductPrice)) {
                $this->Flash->success(__('The pharmacy product price has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pharmacy product price could not be saved. Please, try again.'));
            }
        }
        $pharmacyProducts = $this->PharmacyProductPrices->PharmacyProducts->find('list', ['limit' => 200]);
        $this->set(compact('pharmacyProductPrice', 'pharmacyProducts'));
        $this->set('_serialize', ['pharmacyProductPrice']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pharmacy Product Price id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pharmacyProductPrice = $this->PharmacyProductPrices->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pharmacyProductPrice = $this->PharmacyProductPrices->patchEntity($pharmacyProductPrice, $this->request->data);
            if ($this->PharmacyProductPrices->save($pharmacyProductPrice)) {
                $this->Flash->success(__('The pharmacy product price has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pharmacy product price could not be saved. Please, try again.'));
            }
        }
        $pharmacyProducts = $this->PharmacyProductPrices->PharmacyProducts->find('list', ['limit' => 200]);
        $this->set(compact('pharmacyProductPrice', 'pharmacyProducts'));
        $this->set('_serialize', ['pharmacyProductPrice']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pharmacy Product Price id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pharmacyProductPrice = $this->PharmacyProductPrices->get($id);
        if ($this->PharmacyProductPrices->delete($pharmacyProductPrice)) {
            $this->Flash->success(__('The pharmacy product price has been deleted.'));
        } else {
            $this->Flash->error(__('The pharmacy product price could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
