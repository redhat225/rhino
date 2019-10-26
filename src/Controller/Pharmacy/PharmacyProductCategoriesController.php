<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PharmacyProductCategories Controller
 *
 * @property \App\Model\Table\PharmacyProductCategoriesTable $PharmacyProductCategories
 */
class PharmacyProductCategoriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $pharmacyProductCategories = $this->paginate($this->PharmacyProductCategories);

        $this->set(compact('pharmacyProductCategories'));
        $this->set('_serialize', ['pharmacyProductCategories']);
    }

    /**
     * View method
     *
     * @param string|null $id Pharmacy Product Category id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pharmacyProductCategory = $this->PharmacyProductCategories->get($id, [
            'contain' => ['PharmacyProducts']
        ]);

        $this->set('pharmacyProductCategory', $pharmacyProductCategory);
        $this->set('_serialize', ['pharmacyProductCategory']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pharmacyProductCategory = $this->PharmacyProductCategories->newEntity();
        if ($this->request->is('post')) {
            $pharmacyProductCategory = $this->PharmacyProductCategories->patchEntity($pharmacyProductCategory, $this->request->data);
            if ($this->PharmacyProductCategories->save($pharmacyProductCategory)) {
                $this->Flash->success(__('The pharmacy product category has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pharmacy product category could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('pharmacyProductCategory'));
        $this->set('_serialize', ['pharmacyProductCategory']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pharmacy Product Category id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pharmacyProductCategory = $this->PharmacyProductCategories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pharmacyProductCategory = $this->PharmacyProductCategories->patchEntity($pharmacyProductCategory, $this->request->data);
            if ($this->PharmacyProductCategories->save($pharmacyProductCategory)) {
                $this->Flash->success(__('The pharmacy product category has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pharmacy product category could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('pharmacyProductCategory'));
        $this->set('_serialize', ['pharmacyProductCategory']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pharmacy Product Category id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pharmacyProductCategory = $this->PharmacyProductCategories->get($id);
        if ($this->PharmacyProductCategories->delete($pharmacyProductCategory)) {
            $this->Flash->success(__('The pharmacy product category has been deleted.'));
        } else {
            $this->Flash->error(__('The pharmacy product category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
