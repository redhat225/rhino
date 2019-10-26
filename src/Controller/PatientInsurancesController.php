<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PatientInsurances Controller
 *
 * @property \App\Model\Table\PatientInsurancesTable $PatientInsurances
 */
class PatientInsurancesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['PatientInsurers']
        ];
        $patientInsurances = $this->paginate($this->PatientInsurances);

        $this->set(compact('patientInsurances'));
        $this->set('_serialize', ['patientInsurances']);
    }

    /**
     * View method
     *
     * @param string|null $id Patient Insurance id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $patientInsurance = $this->PatientInsurances->get($id, [
            'contain' => ['PatientInsurers']
        ]);

        $this->set('patientInsurance', $patientInsurance);
        $this->set('_serialize', ['patientInsurance']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $patientInsurance = $this->PatientInsurances->newEntity();
        if ($this->request->is('post')) {
            $patientInsurance = $this->PatientInsurances->patchEntity($patientInsurance, $this->request->data);
            if ($this->PatientInsurances->save($patientInsurance)) {
                $this->Flash->success(__('The patient insurance has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The patient insurance could not be saved. Please, try again.'));
            }
        }
        $patientInsurers = $this->PatientInsurances->PatientInsurers->find('list', ['limit' => 200]);
        $this->set(compact('patientInsurance', 'patientInsurers'));
        $this->set('_serialize', ['patientInsurance']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Patient Insurance id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $patientInsurance = $this->PatientInsurances->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $patientInsurance = $this->PatientInsurances->patchEntity($patientInsurance, $this->request->data);
            if ($this->PatientInsurances->save($patientInsurance)) {
                $this->Flash->success(__('The patient insurance has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The patient insurance could not be saved. Please, try again.'));
            }
        }
        $patientInsurers = $this->PatientInsurances->PatientInsurers->find('list', ['limit' => 200]);
        $this->set(compact('patientInsurance', 'patientInsurers'));
        $this->set('_serialize', ['patientInsurance']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Patient Insurance id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $patientInsurance = $this->PatientInsurances->get($id);
        if ($this->PatientInsurances->delete($patientInsurance)) {
            $this->Flash->success(__('The patient insurance has been deleted.'));
        } else {
            $this->Flash->error(__('The patient insurance could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
