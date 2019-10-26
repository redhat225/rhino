<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PharmacyStoreProductLevels Controller
 *
 * @property \App\Model\Table\PharmacyStoreProductLevelsTable $PharmacyStoreProductLevels
 */
class PharmacyStoreProductLevelsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['PharmacyStoreProducts']
        ];
        $pharmacyStoreProductLevels = $this->paginate($this->PharmacyStoreProductLevels);

        $this->set(compact('pharmacyStoreProductLevels'));
        $this->set('_serialize', ['pharmacyStoreProductLevels']);
    }

    /**
     * View method
     *
     * @param string|null $id Pharmacy Store Product Level id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pharmacyStoreProductLevel = $this->PharmacyStoreProductLevels->get($id, [
            'contain' => ['PharmacyStoreProducts']
        ]);

        $this->set('pharmacyStoreProductLevel', $pharmacyStoreProductLevel);
        $this->set('_serialize', ['pharmacyStoreProductLevel']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pharmacyStoreProductLevel = $this->PharmacyStoreProductLevels->newEntity();
        if ($this->request->is('post')) {
            $pharmacyStoreProductLevel = $this->PharmacyStoreProductLevels->patchEntity($pharmacyStoreProductLevel, $this->request->data);
            if ($this->PharmacyStoreProductLevels->save($pharmacyStoreProductLevel)) {
                $this->Flash->success(__('The pharmacy store product level has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pharmacy store product level could not be saved. Please, try again.'));
            }
        }
        $pharmacyStoreProducts = $this->PharmacyStoreProductLevels->PharmacyStoreProducts->find('list', ['limit' => 200]);
        $this->set(compact('pharmacyStoreProductLevel', 'pharmacyStoreProducts'));
        $this->set('_serialize', ['pharmacyStoreProductLevel']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pharmacy Store Product Level id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pharmacyStoreProductLevel = $this->PharmacyStoreProductLevels->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pharmacyStoreProductLevel = $this->PharmacyStoreProductLevels->patchEntity($pharmacyStoreProductLevel, $this->request->data);
            if ($this->PharmacyStoreProductLevels->save($pharmacyStoreProductLevel)) {
                $this->Flash->success(__('The pharmacy store product level has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pharmacy store product level could not be saved. Please, try again.'));
            }
        }
        $pharmacyStoreProducts = $this->PharmacyStoreProductLevels->PharmacyStoreProducts->find('list', ['limit' => 200]);
        $this->set(compact('pharmacyStoreProductLevel', 'pharmacyStoreProducts'));
        $this->set('_serialize', ['pharmacyStoreProductLevel']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pharmacy Store Product Level id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pharmacyStoreProductLevel = $this->PharmacyStoreProductLevels->get($id);
        if ($this->PharmacyStoreProductLevels->delete($pharmacyStoreProductLevel)) {
            $this->Flash->success(__('The pharmacy store product level has been deleted.'));
        } else {
            $this->Flash->error(__('The pharmacy store product level could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
