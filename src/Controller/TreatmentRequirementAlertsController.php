<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TreatmentRequirementAlerts Controller
 *
 * @property \App\Model\Table\TreatmentRequirementAlertsTable $TreatmentRequirementAlerts
 */
class TreatmentRequirementAlertsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['TreatmentRequirements']
        ];
        $treatmentRequirementAlerts = $this->paginate($this->TreatmentRequirementAlerts);

        $this->set(compact('treatmentRequirementAlerts'));
        $this->set('_serialize', ['treatmentRequirementAlerts']);
    }

    /**
     * View method
     *
     * @param string|null $id Treatment Requirement Alert id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $treatmentRequirementAlert = $this->TreatmentRequirementAlerts->get($id, [
            'contain' => ['TreatmentRequirements']
        ]);

        $this->set('treatmentRequirementAlert', $treatmentRequirementAlert);
        $this->set('_serialize', ['treatmentRequirementAlert']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $treatmentRequirementAlert = $this->TreatmentRequirementAlerts->newEntity();
        if ($this->request->is('post')) {
            $treatmentRequirementAlert = $this->TreatmentRequirementAlerts->patchEntity($treatmentRequirementAlert, $this->request->data);
            if ($this->TreatmentRequirementAlerts->save($treatmentRequirementAlert)) {
                $this->Flash->success(__('The treatment requirement alert has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The treatment requirement alert could not be saved. Please, try again.'));
            }
        }
        $treatmentRequirements = $this->TreatmentRequirementAlerts->TreatmentRequirements->find('list', ['limit' => 200]);
        $this->set(compact('treatmentRequirementAlert', 'treatmentRequirements'));
        $this->set('_serialize', ['treatmentRequirementAlert']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Treatment Requirement Alert id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $treatmentRequirementAlert = $this->TreatmentRequirementAlerts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $treatmentRequirementAlert = $this->TreatmentRequirementAlerts->patchEntity($treatmentRequirementAlert, $this->request->data);
            if ($this->TreatmentRequirementAlerts->save($treatmentRequirementAlert)) {
                $this->Flash->success(__('The treatment requirement alert has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The treatment requirement alert could not be saved. Please, try again.'));
            }
        }
        $treatmentRequirements = $this->TreatmentRequirementAlerts->TreatmentRequirements->find('list', ['limit' => 200]);
        $this->set(compact('treatmentRequirementAlert', 'treatmentRequirements'));
        $this->set('_serialize', ['treatmentRequirementAlert']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Treatment Requirement Alert id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $treatmentRequirementAlert = $this->TreatmentRequirementAlerts->get($id);
        if ($this->TreatmentRequirementAlerts->delete($treatmentRequirementAlert)) {
            $this->Flash->success(__('The treatment requirement alert has been deleted.'));
        } else {
            $this->Flash->error(__('The treatment requirement alert could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
