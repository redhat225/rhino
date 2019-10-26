<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PharmacyOperatorActDetails Controller
 *
 * @property \App\Model\Table\PharmacyOperatorActDetailsTable $PharmacyOperatorActDetails
 */
class PharmacyOperatorActDetailsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['PharmacyOperatorActs', 'PharmacyOperators']
        ];
        $pharmacyOperatorActDetails = $this->paginate($this->PharmacyOperatorActDetails);

        $this->set(compact('pharmacyOperatorActDetails'));
        $this->set('_serialize', ['pharmacyOperatorActDetails']);
    }

    /**
     * View method
     *
     * @param string|null $id Pharmacy Operator Act Detail id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pharmacyOperatorActDetail = $this->PharmacyOperatorActDetails->get($id, [
            'contain' => ['PharmacyOperatorActs', 'PharmacyOperators']
        ]);

        $this->set('pharmacyOperatorActDetail', $pharmacyOperatorActDetail);
        $this->set('_serialize', ['pharmacyOperatorActDetail']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pharmacyOperatorActDetail = $this->PharmacyOperatorActDetails->newEntity();
        if ($this->request->is('post')) {
            $pharmacyOperatorActDetail = $this->PharmacyOperatorActDetails->patchEntity($pharmacyOperatorActDetail, $this->request->data);
            if ($this->PharmacyOperatorActDetails->save($pharmacyOperatorActDetail)) {
                $this->Flash->success(__('The pharmacy operator act detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pharmacy operator act detail could not be saved. Please, try again.'));
            }
        }
        $pharmacyOperatorActs = $this->PharmacyOperatorActDetails->PharmacyOperatorActs->find('list', ['limit' => 200]);
        $pharmacyOperators = $this->PharmacyOperatorActDetails->PharmacyOperators->find('list', ['limit' => 200]);
        $this->set(compact('pharmacyOperatorActDetail', 'pharmacyOperatorActs', 'pharmacyOperators'));
        $this->set('_serialize', ['pharmacyOperatorActDetail']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pharmacy Operator Act Detail id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pharmacyOperatorActDetail = $this->PharmacyOperatorActDetails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pharmacyOperatorActDetail = $this->PharmacyOperatorActDetails->patchEntity($pharmacyOperatorActDetail, $this->request->data);
            if ($this->PharmacyOperatorActDetails->save($pharmacyOperatorActDetail)) {
                $this->Flash->success(__('The pharmacy operator act detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pharmacy operator act detail could not be saved. Please, try again.'));
            }
        }
        $pharmacyOperatorActs = $this->PharmacyOperatorActDetails->PharmacyOperatorActs->find('list', ['limit' => 200]);
        $pharmacyOperators = $this->PharmacyOperatorActDetails->PharmacyOperators->find('list', ['limit' => 200]);
        $this->set(compact('pharmacyOperatorActDetail', 'pharmacyOperatorActs', 'pharmacyOperators'));
        $this->set('_serialize', ['pharmacyOperatorActDetail']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pharmacy Operator Act Detail id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pharmacyOperatorActDetail = $this->PharmacyOperatorActDetails->get($id);
        if ($this->PharmacyOperatorActDetails->delete($pharmacyOperatorActDetail)) {
            $this->Flash->success(__('The pharmacy operator act detail has been deleted.'));
        } else {
            $this->Flash->error(__('The pharmacy operator act detail could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
