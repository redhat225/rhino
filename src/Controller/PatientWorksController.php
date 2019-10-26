<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PatientWorks Controller
 *
 * @property \App\Model\Table\PatientWorksTable $PatientWorks
 */
class PatientWorksController extends AppController
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
        $patientWorks = $this->paginate($this->PatientWorks);

        $this->set(compact('patientWorks'));
        $this->set('_serialize', ['patientWorks']);
    }

    /**
     * View method
     *
     * @param string|null $id Patient Work id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $patientWork = $this->PatientWorks->get($id, [
            'contain' => ['Patients']
        ]);

        $this->set('patientWork', $patientWork);
        $this->set('_serialize', ['patientWork']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $patientWork = $this->PatientWorks->newEntity();
        if ($this->request->is('post')) {
            $patientWork = $this->PatientWorks->patchEntity($patientWork, $this->request->data);
            if ($this->PatientWorks->save($patientWork)) {
                $this->Flash->success(__('The patient work has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The patient work could not be saved. Please, try again.'));
            }
        }
        $patients = $this->PatientWorks->Patients->find('list', ['limit' => 200]);
        $this->set(compact('patientWork', 'patients'));
        $this->set('_serialize', ['patientWork']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Patient Work id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $patientWork = $this->PatientWorks->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $patientWork = $this->PatientWorks->patchEntity($patientWork, $this->request->data);
            if ($this->PatientWorks->save($patientWork)) {
                $this->Flash->success(__('The patient work has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The patient work could not be saved. Please, try again.'));
            }
        }
        $patients = $this->PatientWorks->Patients->find('list', ['limit' => 200]);
        $this->set(compact('patientWork', 'patients'));
        $this->set('_serialize', ['patientWork']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Patient Work id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $patientWork = $this->PatientWorks->get($id);
        if ($this->PatientWorks->delete($patientWork)) {
            $this->Flash->success(__('The patient work has been deleted.'));
        } else {
            $this->Flash->error(__('The patient work could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
