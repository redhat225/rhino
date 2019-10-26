<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PatientAntecedentTypes Controller
 *
 * @property \App\Model\Table\PatientAntecedentTypesTable $PatientAntecedentTypes
 */
class PatientAntecedentTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $patientAntecedentTypes = $this->paginate($this->PatientAntecedentTypes);

        $this->set(compact('patientAntecedentTypes'));
        $this->set('_serialize', ['patientAntecedentTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Patient Antecedent Type id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $patientAntecedentType = $this->PatientAntecedentTypes->get($id, [
            'contain' => ['PatientAntecedents']
        ]);

        $this->set('patientAntecedentType', $patientAntecedentType);
        $this->set('_serialize', ['patientAntecedentType']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $patientAntecedentType = $this->PatientAntecedentTypes->newEntity();
        if ($this->request->is('post')) {
            $patientAntecedentType = $this->PatientAntecedentTypes->patchEntity($patientAntecedentType, $this->request->data);
            if ($this->PatientAntecedentTypes->save($patientAntecedentType)) {
                $this->Flash->success(__('The patient antecedent type has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The patient antecedent type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('patientAntecedentType'));
        $this->set('_serialize', ['patientAntecedentType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Patient Antecedent Type id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $patientAntecedentType = $this->PatientAntecedentTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $patientAntecedentType = $this->PatientAntecedentTypes->patchEntity($patientAntecedentType, $this->request->data);
            if ($this->PatientAntecedentTypes->save($patientAntecedentType)) {
                $this->Flash->success(__('The patient antecedent type has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The patient antecedent type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('patientAntecedentType'));
        $this->set('_serialize', ['patientAntecedentType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Patient Antecedent Type id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $patientAntecedentType = $this->PatientAntecedentTypes->get($id);
        if ($this->PatientAntecedentTypes->delete($patientAntecedentType)) {
            $this->Flash->success(__('The patient antecedent type has been deleted.'));
        } else {
            $this->Flash->error(__('The patient antecedent type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
