<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PharmacyOperatorActs Controller
 *
 * @property \App\Model\Table\PharmacyOperatorActsTable $PharmacyOperatorActs
 */
class PharmacyOperatorActsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $pharmacyOperatorActs = $this->paginate($this->PharmacyOperatorActs);

        $this->set(compact('pharmacyOperatorActs'));
        $this->set('_serialize', ['pharmacyOperatorActs']);
    }

    /**
     * View method
     *
     * @param string|null $id Pharmacy Operator Act id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pharmacyOperatorAct = $this->PharmacyOperatorActs->get($id, [
            'contain' => ['PharmacyOperatorActDetails']
        ]);

        $this->set('pharmacyOperatorAct', $pharmacyOperatorAct);
        $this->set('_serialize', ['pharmacyOperatorAct']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pharmacyOperatorAct = $this->PharmacyOperatorActs->newEntity();
        if ($this->request->is('post')) {
            $pharmacyOperatorAct = $this->PharmacyOperatorActs->patchEntity($pharmacyOperatorAct, $this->request->data);
            if ($this->PharmacyOperatorActs->save($pharmacyOperatorAct)) {
                $this->Flash->success(__('The pharmacy operator act has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pharmacy operator act could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('pharmacyOperatorAct'));
        $this->set('_serialize', ['pharmacyOperatorAct']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pharmacy Operator Act id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pharmacyOperatorAct = $this->PharmacyOperatorActs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pharmacyOperatorAct = $this->PharmacyOperatorActs->patchEntity($pharmacyOperatorAct, $this->request->data);
            if ($this->PharmacyOperatorActs->save($pharmacyOperatorAct)) {
                $this->Flash->success(__('The pharmacy operator act has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pharmacy operator act could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('pharmacyOperatorAct'));
        $this->set('_serialize', ['pharmacyOperatorAct']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pharmacy Operator Act id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pharmacyOperatorAct = $this->PharmacyOperatorActs->get($id);
        if ($this->PharmacyOperatorActs->delete($pharmacyOperatorAct)) {
            $this->Flash->success(__('The pharmacy operator act has been deleted.'));
        } else {
            $this->Flash->error(__('The pharmacy operator act could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
