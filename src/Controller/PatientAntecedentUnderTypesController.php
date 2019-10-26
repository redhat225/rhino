<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PatientAntecedentUnderTypes Controller
 *
 * @property \App\Model\Table\PatientAntecedentUnderTypesTable $PatientAntecedentUnderTypes
 */
class PatientAntecedentUnderTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['PatientAntecedentTypes']
        ];
        $patientAntecedentUnderTypes = $this->paginate($this->PatientAntecedentUnderTypes);

        $this->set(compact('patientAntecedentUnderTypes'));
        $this->set('_serialize', ['patientAntecedentUnderTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Patient Antecedent Under Type id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $patientAntecedentUnderType = $this->PatientAntecedentUnderTypes->get($id, [
            'contain' => ['PatientAntecedentTypes', 'PatientAntecedentItems']
        ]);

        $this->set('patientAntecedentUnderType', $patientAntecedentUnderType);
        $this->set('_serialize', ['patientAntecedentUnderType']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $patientAntecedentUnderType = $this->PatientAntecedentUnderTypes->newEntity();
        if ($this->request->is('post')) {
            $patientAntecedentUnderType = $this->PatientAntecedentUnderTypes->patchEntity($patientAntecedentUnderType, $this->request->data);
            if ($this->PatientAntecedentUnderTypes->save($patientAntecedentUnderType)) {
                $this->Flash->success(__('The patient antecedent under type has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The patient antecedent under type could not be saved. Please, try again.'));
            }
        }
        $patientAntecedentTypes = $this->PatientAntecedentUnderTypes->PatientAntecedentTypes->find('list', ['limit' => 200]);
        $this->set(compact('patientAntecedentUnderType', 'patientAntecedentTypes'));
        $this->set('_serialize', ['patientAntecedentUnderType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Patient Antecedent Under Type id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $patientAntecedentUnderType = $this->PatientAntecedentUnderTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $patientAntecedentUnderType = $this->PatientAntecedentUnderTypes->patchEntity($patientAntecedentUnderType, $this->request->data);
            if ($this->PatientAntecedentUnderTypes->save($patientAntecedentUnderType)) {
                $this->Flash->success(__('The patient antecedent under type has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The patient antecedent under type could not be saved. Please, try again.'));
            }
        }
        $patientAntecedentTypes = $this->PatientAntecedentUnderTypes->PatientAntecedentTypes->find('list', ['limit' => 200]);
        $this->set(compact('patientAntecedentUnderType', 'patientAntecedentTypes'));
        $this->set('_serialize', ['patientAntecedentUnderType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Patient Antecedent Under Type id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $patientAntecedentUnderType = $this->PatientAntecedentUnderTypes->get($id);
        if ($this->PatientAntecedentUnderTypes->delete($patientAntecedentUnderType)) {
            $this->Flash->success(__('The patient antecedent under type has been deleted.'));
        } else {
            $this->Flash->error(__('The patient antecedent under type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
