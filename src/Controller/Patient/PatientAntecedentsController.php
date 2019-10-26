<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PatientAntecedents Controller
 *
 * @property \App\Model\Table\PatientAntecedentsTable $PatientAntecedents
 */
class PatientAntecedentsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Patients', 'PatientAntecedentTypes']
        ];
        $patientAntecedents = $this->paginate($this->PatientAntecedents);

        $this->set(compact('patientAntecedents'));
        $this->set('_serialize', ['patientAntecedents']);
    }

    /**
     * View method
     *
     * @param string|null $id Patient Antecedent id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $patientAntecedent = $this->PatientAntecedents->get($id, [
            'contain' => ['Patients', 'PatientAntecedentTypes']
        ]);

        $this->set('patientAntecedent', $patientAntecedent);
        $this->set('_serialize', ['patientAntecedent']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $patientAntecedent = $this->PatientAntecedents->newEntity();
        if ($this->request->is('post')) {
            $patientAntecedent = $this->PatientAntecedents->patchEntity($patientAntecedent, $this->request->data);
            if ($this->PatientAntecedents->save($patientAntecedent)) {
                $this->Flash->success(__('The patient antecedent has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The patient antecedent could not be saved. Please, try again.'));
            }
        }
        $patients = $this->PatientAntecedents->Patients->find('list', ['limit' => 200]);
        $patientAntecedentTypes = $this->PatientAntecedents->PatientAntecedentTypes->find('list', ['limit' => 200]);
        $this->set(compact('patientAntecedent', 'patients', 'patientAntecedentTypes'));
        $this->set('_serialize', ['patientAntecedent']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Patient Antecedent id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $patientAntecedent = $this->PatientAntecedents->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $patientAntecedent = $this->PatientAntecedents->patchEntity($patientAntecedent, $this->request->data);
            if ($this->PatientAntecedents->save($patientAntecedent)) {
                $this->Flash->success(__('The patient antecedent has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The patient antecedent could not be saved. Please, try again.'));
            }
        }
        $patients = $this->PatientAntecedents->Patients->find('list', ['limit' => 200]);
        $patientAntecedentTypes = $this->PatientAntecedents->PatientAntecedentTypes->find('list', ['limit' => 200]);
        $this->set(compact('patientAntecedent', 'patients', 'patientAntecedentTypes'));
        $this->set('_serialize', ['patientAntecedent']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Patient Antecedent id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $patientAntecedent = $this->PatientAntecedents->get($id);
        if ($this->PatientAntecedents->delete($patientAntecedent)) {
            $this->Flash->success(__('The patient antecedent has been deleted.'));
        } else {
            $this->Flash->error(__('The patient antecedent could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
