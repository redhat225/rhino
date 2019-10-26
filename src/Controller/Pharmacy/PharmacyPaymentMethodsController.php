<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PharmacyPaymentMethods Controller
 *
 * @property \App\Model\Table\PharmacyPaymentMethodsTable $PharmacyPaymentMethods
 */
class PharmacyPaymentMethodsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $pharmacyPaymentMethods = $this->paginate($this->PharmacyPaymentMethods);

        $this->set(compact('pharmacyPaymentMethods'));
        $this->set('_serialize', ['pharmacyPaymentMethods']);
    }

    /**
     * View method
     *
     * @param string|null $id Pharmacy Payment Method id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pharmacyPaymentMethod = $this->PharmacyPaymentMethods->get($id, [
            'contain' => ['PharmacyPayments']
        ]);

        $this->set('pharmacyPaymentMethod', $pharmacyPaymentMethod);
        $this->set('_serialize', ['pharmacyPaymentMethod']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pharmacyPaymentMethod = $this->PharmacyPaymentMethods->newEntity();
        if ($this->request->is('post')) {
            $pharmacyPaymentMethod = $this->PharmacyPaymentMethods->patchEntity($pharmacyPaymentMethod, $this->request->data);
            if ($this->PharmacyPaymentMethods->save($pharmacyPaymentMethod)) {
                $this->Flash->success(__('The pharmacy payment method has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pharmacy payment method could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('pharmacyPaymentMethod'));
        $this->set('_serialize', ['pharmacyPaymentMethod']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pharmacy Payment Method id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pharmacyPaymentMethod = $this->PharmacyPaymentMethods->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pharmacyPaymentMethod = $this->PharmacyPaymentMethods->patchEntity($pharmacyPaymentMethod, $this->request->data);
            if ($this->PharmacyPaymentMethods->save($pharmacyPaymentMethod)) {
                $this->Flash->success(__('The pharmacy payment method has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pharmacy payment method could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('pharmacyPaymentMethod'));
        $this->set('_serialize', ['pharmacyPaymentMethod']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pharmacy Payment Method id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pharmacyPaymentMethod = $this->PharmacyPaymentMethods->get($id);
        if ($this->PharmacyPaymentMethods->delete($pharmacyPaymentMethod)) {
            $this->Flash->success(__('The pharmacy payment method has been deleted.'));
        } else {
            $this->Flash->error(__('The pharmacy payment method could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
