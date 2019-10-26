<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PatientSchedules Controller
 *
 * @property \App\Model\Table\PatientSchedulesTable $PatientSchedules
 */
class PatientSchedulesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Patients']
        ];
        $patientSchedules = $this->paginate($this->PatientSchedules);

        $this->set(compact('patientSchedules'));
        $this->set('_serialize', ['patientSchedules']);
    }

    /**
     * View method
     *
     * @param string|null $id Patient Schedule id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $patientSchedule = $this->PatientSchedules->get($id, [
            'contain' => ['Patients']
        ]);

        $this->set('patientSchedule', $patientSchedule);
        $this->set('_serialize', ['patientSchedule']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $patientSchedule = $this->PatientSchedules->newEntity();
        if ($this->request->is('post')) {
            $patientSchedule = $this->PatientSchedules->patchEntity($patientSchedule, $this->request->data);
            if ($this->PatientSchedules->save($patientSchedule)) {
                $this->Flash->success(__('The patient schedule has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The patient schedule could not be saved. Please, try again.'));
            }
        }
        $patients = $this->PatientSchedules->Patients->find('list', ['limit' => 200]);
        $this->set(compact('patientSchedule', 'patients'));
        $this->set('_serialize', ['patientSchedule']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Patient Schedule id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $patientSchedule = $this->PatientSchedules->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $patientSchedule = $this->PatientSchedules->patchEntity($patientSchedule, $this->request->data);
            if ($this->PatientSchedules->save($patientSchedule)) {
                $this->Flash->success(__('The patient schedule has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The patient schedule could not be saved. Please, try again.'));
            }
        }
        $patients = $this->PatientSchedules->Patients->find('list', ['limit' => 200]);
        $this->set(compact('patientSchedule', 'patients'));
        $this->set('_serialize', ['patientSchedule']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Patient Schedule id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $patientSchedule = $this->PatientSchedules->get($id);
        if ($this->PatientSchedules->delete($patientSchedule)) {
            $this->Flash->success(__('The patient schedule has been deleted.'));
        } else {
            $this->Flash->error(__('The patient schedule could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
