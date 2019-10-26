<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PatientCompanyDetails Controller
 *
 * @property \App\Model\Table\PatientCompanyDetailsTable $PatientCompanyDetails
 */
class PatientCompanyDetailsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Patients', 'PatientCompanies']
        ];
        $patientCompanyDetails = $this->paginate($this->PatientCompanyDetails);

        $this->set(compact('patientCompanyDetails'));
        $this->set('_serialize', ['patientCompanyDetails']);
    }

    /**
     * View method
     *
     * @param string|null $id Patient Company Detail id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $patientCompanyDetail = $this->PatientCompanyDetails->get($id, [
            'contain' => ['Patients', 'PatientCompanies']
        ]);

        $this->set('patientCompanyDetail', $patientCompanyDetail);
        $this->set('_serialize', ['patientCompanyDetail']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $patientCompanyDetail = $this->PatientCompanyDetails->newEntity();
        if ($this->request->is('post')) {
            $patientCompanyDetail = $this->PatientCompanyDetails->patchEntity($patientCompanyDetail, $this->request->data);
            if ($this->PatientCompanyDetails->save($patientCompanyDetail)) {
                $this->Flash->success(__('The patient company detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The patient company detail could not be saved. Please, try again.'));
            }
        }
        $patients = $this->PatientCompanyDetails->Patients->find('list', ['limit' => 200]);
        $patientCompanies = $this->PatientCompanyDetails->PatientCompanies->find('list', ['limit' => 200]);
        $this->set(compact('patientCompanyDetail', 'patients', 'patientCompanies'));
        $this->set('_serialize', ['patientCompanyDetail']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Patient Company Detail id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $patientCompanyDetail = $this->PatientCompanyDetails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $patientCompanyDetail = $this->PatientCompanyDetails->patchEntity($patientCompanyDetail, $this->request->data);
            if ($this->PatientCompanyDetails->save($patientCompanyDetail)) {
                $this->Flash->success(__('The patient company detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The patient company detail could not be saved. Please, try again.'));
            }
        }
        $patients = $this->PatientCompanyDetails->Patients->find('list', ['limit' => 200]);
        $patientCompanies = $this->PatientCompanyDetails->PatientCompanies->find('list', ['limit' => 200]);
        $this->set(compact('patientCompanyDetail', 'patients', 'patientCompanies'));
        $this->set('_serialize', ['patientCompanyDetail']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Patient Company Detail id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $patientCompanyDetail = $this->PatientCompanyDetails->get($id);
        if ($this->PatientCompanyDetails->delete($patientCompanyDetail)) {
            $this->Flash->success(__('The patient company detail has been deleted.'));
        } else {
            $this->Flash->error(__('The patient company detail could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
