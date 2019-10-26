<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PatientInsurers Controller
 *
 * @property \App\Model\Table\PatientInsurersTable $PatientInsurers
 */
class PatientInsurersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $patientInsurers = $this->paginate($this->PatientInsurers);

        $this->set(compact('patientInsurers'));
        $this->set('_serialize', ['patientInsurers']);
    }

    /**
     * View method
     *
     * @param string|null $id Patient Insurer id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $patientInsurer = $this->PatientInsurers->get($id, [
            'contain' => ['PatientInsurances']
        ]);

        $this->set('patientInsurer', $patientInsurer);
        $this->set('_serialize', ['patientInsurer']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $patientInsurer = $this->PatientInsurers->newEntity();
        if ($this->request->is('post')) {
            $patientInsurer = $this->PatientInsurers->patchEntity($patientInsurer, $this->request->data);
            if ($this->PatientInsurers->save($patientInsurer)) {
                $this->Flash->success(__('The patient insurer has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The patient insurer could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('patientInsurer'));
        $this->set('_serialize', ['patientInsurer']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Patient Insurer id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $patientInsurer = $this->PatientInsurers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $patientInsurer = $this->PatientInsurers->patchEntity($patientInsurer, $this->request->data);
            if ($this->PatientInsurers->save($patientInsurer)) {
                $this->Flash->success(__('The patient insurer has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The patient insurer could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('patientInsurer'));
        $this->set('_serialize', ['patientInsurer']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Patient Insurer id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $patientInsurer = $this->PatientInsurers->get($id);
        if ($this->PatientInsurers->delete($patientInsurer)) {
            $this->Flash->success(__('The patient insurer has been deleted.'));
        } else {
            $this->Flash->error(__('The patient insurer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
