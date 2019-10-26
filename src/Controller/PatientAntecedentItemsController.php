<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PatientAntecedentItems Controller
 *
 * @property \App\Model\Table\PatientAntecedentItemsTable $PatientAntecedentItems
 */
class PatientAntecedentItemsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['PatientAntecedentUnderTypes']
        ];
        $patientAntecedentItems = $this->paginate($this->PatientAntecedentItems);

        $this->set(compact('patientAntecedentItems'));
        $this->set('_serialize', ['patientAntecedentItems']);
    }

    /**
     * View method
     *
     * @param string|null $id Patient Antecedent Item id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $patientAntecedentItem = $this->PatientAntecedentItems->get($id, [
            'contain' => ['PatientAntecedentUnderTypes', 'PatientAntecedents']
        ]);

        $this->set('patientAntecedentItem', $patientAntecedentItem);
        $this->set('_serialize', ['patientAntecedentItem']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $patientAntecedentItem = $this->PatientAntecedentItems->newEntity();
        if ($this->request->is('post')) {
            $patientAntecedentItem = $this->PatientAntecedentItems->patchEntity($patientAntecedentItem, $this->request->data);
            if ($this->PatientAntecedentItems->save($patientAntecedentItem)) {
                $this->Flash->success(__('The patient antecedent item has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The patient antecedent item could not be saved. Please, try again.'));
            }
        }
        $patientAntecedentUnderTypes = $this->PatientAntecedentItems->PatientAntecedentUnderTypes->find('list', ['limit' => 200]);
        $this->set(compact('patientAntecedentItem', 'patientAntecedentUnderTypes'));
        $this->set('_serialize', ['patientAntecedentItem']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Patient Antecedent Item id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $patientAntecedentItem = $this->PatientAntecedentItems->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $patientAntecedentItem = $this->PatientAntecedentItems->patchEntity($patientAntecedentItem, $this->request->data);
            if ($this->PatientAntecedentItems->save($patientAntecedentItem)) {
                $this->Flash->success(__('The patient antecedent item has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The patient antecedent item could not be saved. Please, try again.'));
            }
        }
        $patientAntecedentUnderTypes = $this->PatientAntecedentItems->PatientAntecedentUnderTypes->find('list', ['limit' => 200]);
        $this->set(compact('patientAntecedentItem', 'patientAntecedentUnderTypes'));
        $this->set('_serialize', ['patientAntecedentItem']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Patient Antecedent Item id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $patientAntecedentItem = $this->PatientAntecedentItems->get($id);
        if ($this->PatientAntecedentItems->delete($patientAntecedentItem)) {
            $this->Flash->success(__('The patient antecedent item has been deleted.'));
        } else {
            $this->Flash->error(__('The patient antecedent item could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
