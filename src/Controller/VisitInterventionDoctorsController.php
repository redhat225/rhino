<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * VisitInterventionDoctors Controller
 *
 * @property \App\Model\Table\VisitInterventionDoctorsTable $VisitInterventionDoctors
 */
class VisitInterventionDoctorsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Doctors', 'Visits', 'VisitInvoices']
        ];
        $visitInterventionDoctors = $this->paginate($this->VisitInterventionDoctors);

        $this->set(compact('visitInterventionDoctors'));
        $this->set('_serialize', ['visitInterventionDoctors']);
    }

    /**
     * View method
     *
     * @param string|null $id Visit Intervention Doctor id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $visitInterventionDoctor = $this->VisitInterventionDoctors->get($id, [
            'contain' => ['Doctors', 'Visits', 'VisitInvoices', 'Exams', 'PatientBookings', 'Treatments', 'VisitActDoctorDetails', 'VisitNotes']
        ]);

        $this->set('visitInterventionDoctor', $visitInterventionDoctor);
        $this->set('_serialize', ['visitInterventionDoctor']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $visitInterventionDoctor = $this->VisitInterventionDoctors->newEntity();
        if ($this->request->is('post')) {
            $visitInterventionDoctor = $this->VisitInterventionDoctors->patchEntity($visitInterventionDoctor, $this->request->data);
            if ($this->VisitInterventionDoctors->save($visitInterventionDoctor)) {
                $this->Flash->success(__('The visit intervention doctor has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The visit intervention doctor could not be saved. Please, try again.'));
            }
        }
        $doctors = $this->VisitInterventionDoctors->Doctors->find('list', ['limit' => 200]);
        $visits = $this->VisitInterventionDoctors->Visits->find('list', ['limit' => 200]);
        $visitInvoices = $this->VisitInterventionDoctors->VisitInvoices->find('list', ['limit' => 200]);
        $this->set(compact('visitInterventionDoctor', 'doctors', 'visits', 'visitInvoices'));
        $this->set('_serialize', ['visitInterventionDoctor']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Visit Intervention Doctor id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $visitInterventionDoctor = $this->VisitInterventionDoctors->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $visitInterventionDoctor = $this->VisitInterventionDoctors->patchEntity($visitInterventionDoctor, $this->request->data);
            if ($this->VisitInterventionDoctors->save($visitInterventionDoctor)) {
                $this->Flash->success(__('The visit intervention doctor has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The visit intervention doctor could not be saved. Please, try again.'));
            }
        }
        $doctors = $this->VisitInterventionDoctors->Doctors->find('list', ['limit' => 200]);
        $visits = $this->VisitInterventionDoctors->Visits->find('list', ['limit' => 200]);
        $visitInvoices = $this->VisitInterventionDoctors->VisitInvoices->find('list', ['limit' => 200]);
        $this->set(compact('visitInterventionDoctor', 'doctors', 'visits', 'visitInvoices'));
        $this->set('_serialize', ['visitInterventionDoctor']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Visit Intervention Doctor id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $visitInterventionDoctor = $this->VisitInterventionDoctors->get($id);
        if ($this->VisitInterventionDoctors->delete($visitInterventionDoctor)) {
            $this->Flash->success(__('The visit intervention doctor has been deleted.'));
        } else {
            $this->Flash->error(__('The visit intervention doctor could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
