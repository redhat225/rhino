<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Visits Controller
 *
 * @property \App\Model\Table\VisitsTable $Visits
 */
class VisitsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['VisitKindTransports', 'VisitLevels', 'Patients', 'ManagerOperators', 'VisitSpecialities', 'VisitTypes']
        ];
        $visits = $this->paginate($this->Visits);

        $this->set(compact('visits'));
        $this->set('_serialize', ['visits']);
    }

    /**
     * View method
     *
     * @param string|null $id Visit id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $visit = $this->Visits->get($id, [
            'contain' => ['VisitKindTransports', 'VisitLevels', 'Patients', 'ManagerOperators', 'VisitSpecialities', 'VisitTypes', 'VisitActs', 'VisitInvoices', 'VisitMeetings', 'VisitOrderDetails']
        ]);

        $this->set('visit', $visit);
        $this->set('_serialize', ['visit']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $visit = $this->Visits->newEntity();
        if ($this->request->is('post')) {
            $visit = $this->Visits->patchEntity($visit, $this->request->data);
            if ($this->Visits->save($visit)) {
                $this->Flash->success(__('The visit has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The visit could not be saved. Please, try again.'));
            }
        }
        $visitKindTransports = $this->Visits->VisitKindTransports->find('list', ['limit' => 200]);
        $visitLevels = $this->Visits->VisitLevels->find('list', ['limit' => 200]);
        $patients = $this->Visits->Patients->find('list', ['limit' => 200]);
        $managerOperators = $this->Visits->ManagerOperators->find('list', ['limit' => 200]);
        $visitSpecialities = $this->Visits->VisitSpecialities->find('list', ['limit' => 200]);
        $visitTypes = $this->Visits->VisitTypes->find('list', ['limit' => 200]);
        $visitActs = $this->Visits->VisitActs->find('list', ['limit' => 200]);
        $this->set(compact('visit', 'visitKindTransports', 'visitLevels', 'patients', 'managerOperators', 'visitSpecialities', 'visitTypes', 'visitActs'));
        $this->set('_serialize', ['visit']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Visit id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $visit = $this->Visits->get($id, [
            'contain' => ['VisitActs']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $visit = $this->Visits->patchEntity($visit, $this->request->data);
            if ($this->Visits->save($visit)) {
                $this->Flash->success(__('The visit has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The visit could not be saved. Please, try again.'));
            }
        }
        $visitKindTransports = $this->Visits->VisitKindTransports->find('list', ['limit' => 200]);
        $visitLevels = $this->Visits->VisitLevels->find('list', ['limit' => 200]);
        $patients = $this->Visits->Patients->find('list', ['limit' => 200]);
        $managerOperators = $this->Visits->ManagerOperators->find('list', ['limit' => 200]);
        $visitSpecialities = $this->Visits->VisitSpecialities->find('list', ['limit' => 200]);
        $visitTypes = $this->Visits->VisitTypes->find('list', ['limit' => 200]);
        $visitActs = $this->Visits->VisitActs->find('list', ['limit' => 200]);
        $this->set(compact('visit', 'visitKindTransports', 'visitLevels', 'patients', 'managerOperators', 'visitSpecialities', 'visitTypes', 'visitActs'));
        $this->set('_serialize', ['visit']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Visit id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $visit = $this->Visits->get($id);
        if ($this->Visits->delete($visit)) {
            $this->Flash->success(__('The visit has been deleted.'));
        } else {
            $this->Flash->error(__('The visit could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
