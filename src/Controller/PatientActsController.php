<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PatientActs Controller
 *
 * @property \App\Model\Table\PatientActsTable $PatientActs
 */
class PatientActsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $patientActs = $this->paginate($this->PatientActs);

        $this->set(compact('patientActs'));
        $this->set('_serialize', ['patientActs']);
    }

    /**
     * View method
     *
     * @param string|null $id Patient Act id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $patientAct = $this->PatientActs->get($id, [
            'contain' => ['PatientActDetails']
        ]);

        $this->set('patientAct', $patientAct);
        $this->set('_serialize', ['patientAct']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $patientAct = $this->PatientActs->newEntity();
        if ($this->request->is('post')) {
            $patientAct = $this->PatientActs->patchEntity($patientAct, $this->request->data);
            if ($this->PatientActs->save($patientAct)) {
                $this->Flash->success(__('The patient act has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The patient act could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('patientAct'));
        $this->set('_serialize', ['patientAct']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Patient Act id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $patientAct = $this->PatientActs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $patientAct = $this->PatientActs->patchEntity($patientAct, $this->request->data);
            if ($this->PatientActs->save($patientAct)) {
                $this->Flash->success(__('The patient act has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The patient act could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('patientAct'));
        $this->set('_serialize', ['patientAct']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Patient Act id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $patientAct = $this->PatientActs->get($id);
        if ($this->PatientActs->delete($patientAct)) {
            $this->Flash->success(__('The patient act has been deleted.'));
        } else {
            $this->Flash->error(__('The patient act could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
