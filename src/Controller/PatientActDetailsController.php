<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PatientActDetails Controller
 *
 * @property \App\Model\Table\PatientActDetailsTable $PatientActDetails
 */
class PatientActDetailsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Patients', 'PatientActs']
        ];
        $patientActDetails = $this->paginate($this->PatientActDetails);

        $this->set(compact('patientActDetails'));
        $this->set('_serialize', ['patientActDetails']);
    }

    /**
     * View method
     *
     * @param string|null $id Patient Act Detail id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $patientActDetail = $this->PatientActDetails->get($id, [
            'contain' => ['Patients', 'PatientActs']
        ]);

        $this->set('patientActDetail', $patientActDetail);
        $this->set('_serialize', ['patientActDetail']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $patientActDetail = $this->PatientActDetails->newEntity();
        if ($this->request->is('post')) {
            $patientActDetail = $this->PatientActDetails->patchEntity($patientActDetail, $this->request->data);
            if ($this->PatientActDetails->save($patientActDetail)) {
                $this->Flash->success(__('The patient act detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The patient act detail could not be saved. Please, try again.'));
            }
        }
        $patients = $this->PatientActDetails->Patients->find('list', ['limit' => 200]);
        $patientActs = $this->PatientActDetails->PatientActs->find('list', ['limit' => 200]);
        $this->set(compact('patientActDetail', 'patients', 'patientActs'));
        $this->set('_serialize', ['patientActDetail']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Patient Act Detail id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $patientActDetail = $this->PatientActDetails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $patientActDetail = $this->PatientActDetails->patchEntity($patientActDetail, $this->request->data);
            if ($this->PatientActDetails->save($patientActDetail)) {
                $this->Flash->success(__('The patient act detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The patient act detail could not be saved. Please, try again.'));
            }
        }
        $patients = $this->PatientActDetails->Patients->find('list', ['limit' => 200]);
        $patientActs = $this->PatientActDetails->PatientActs->find('list', ['limit' => 200]);
        $this->set(compact('patientActDetail', 'patients', 'patientActs'));
        $this->set('_serialize', ['patientActDetail']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Patient Act Detail id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $patientActDetail = $this->PatientActDetails->get($id);
        if ($this->PatientActDetails->delete($patientActDetail)) {
            $this->Flash->success(__('The patient act detail has been deleted.'));
        } else {
            $this->Flash->error(__('The patient act detail could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
