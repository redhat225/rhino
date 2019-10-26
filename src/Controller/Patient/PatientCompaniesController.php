<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PatientCompanies Controller
 *
 * @property \App\Model\Table\PatientCompaniesTable $PatientCompanies
 */
class PatientCompaniesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $patientCompanies = $this->paginate($this->PatientCompanies);

        $this->set(compact('patientCompanies'));
        $this->set('_serialize', ['patientCompanies']);
    }

    /**
     * View method
     *
     * @param string|null $id Patient Company id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $patientCompany = $this->PatientCompanies->get($id, [
            'contain' => ['PatientCompanyDetails']
        ]);

        $this->set('patientCompany', $patientCompany);
        $this->set('_serialize', ['patientCompany']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $patientCompany = $this->PatientCompanies->newEntity();
        if ($this->request->is('post')) {
            $patientCompany = $this->PatientCompanies->patchEntity($patientCompany, $this->request->data);
            if ($this->PatientCompanies->save($patientCompany)) {
                $this->Flash->success(__('The patient company has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The patient company could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('patientCompany'));
        $this->set('_serialize', ['patientCompany']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Patient Company id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $patientCompany = $this->PatientCompanies->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $patientCompany = $this->PatientCompanies->patchEntity($patientCompany, $this->request->data);
            if ($this->PatientCompanies->save($patientCompany)) {
                $this->Flash->success(__('The patient company has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The patient company could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('patientCompany'));
        $this->set('_serialize', ['patientCompany']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Patient Company id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $patientCompany = $this->PatientCompanies->get($id);
        if ($this->PatientCompanies->delete($patientCompany)) {
            $this->Flash->success(__('The patient company has been deleted.'));
        } else {
            $this->Flash->error(__('The patient company could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
