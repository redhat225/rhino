<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TreatmentRequirementRenewals Controller
 *
 * @property \App\Model\Table\TreatmentRequirementRenewalsTable $TreatmentRequirementRenewals
 */
class TreatmentRequirementRenewalsController extends AppController
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
        $treatmentRequirementRenewals = $this->paginate($this->TreatmentRequirementRenewals);

        $this->set(compact('treatmentRequirementRenewals'));
        $this->set('_serialize', ['treatmentRequirementRenewals']);
    }

    /**
     * View method
     *
     * @param string|null $id Treatment Requirement Renewal id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $treatmentRequirementRenewal = $this->TreatmentRequirementRenewals->get($id, [
            'contain' => ['TreatmentRequirements']
        ]);

        $this->set('treatmentRequirementRenewal', $treatmentRequirementRenewal);
        $this->set('_serialize', ['treatmentRequirementRenewal']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $treatmentRequirementRenewal = $this->TreatmentRequirementRenewals->newEntity();
        if ($this->request->is('post')) {
            $treatmentRequirementRenewal = $this->TreatmentRequirementRenewals->patchEntity($treatmentRequirementRenewal, $this->request->data);
            if ($this->TreatmentRequirementRenewals->save($treatmentRequirementRenewal)) {
                $this->Flash->success(__('The treatment requirement renewal has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The treatment requirement renewal could not be saved. Please, try again.'));
            }
        }
        $treatmentRequirements = $this->TreatmentRequirementRenewals->TreatmentRequirements->find('list', ['limit' => 200]);
        $this->set(compact('treatmentRequirementRenewal', 'treatmentRequirements'));
        $this->set('_serialize', ['treatmentRequirementRenewal']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Treatment Requirement Renewal id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $treatmentRequirementRenewal = $this->TreatmentRequirementRenewals->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $treatmentRequirementRenewal = $this->TreatmentRequirementRenewals->patchEntity($treatmentRequirementRenewal, $this->request->data);
            if ($this->TreatmentRequirementRenewals->save($treatmentRequirementRenewal)) {
                $this->Flash->success(__('The treatment requirement renewal has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The treatment requirement renewal could not be saved. Please, try again.'));
            }
        }
        $treatmentRequirements = $this->TreatmentRequirementRenewals->TreatmentRequirements->find('list', ['limit' => 200]);
        $this->set(compact('treatmentRequirementRenewal', 'treatmentRequirements'));
        $this->set('_serialize', ['treatmentRequirementRenewal']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Treatment Requirement Renewal id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $treatmentRequirementRenewal = $this->TreatmentRequirementRenewals->get($id);
        if ($this->TreatmentRequirementRenewals->delete($treatmentRequirementRenewal)) {
            $this->Flash->success(__('The treatment requirement renewal has been deleted.'));
        } else {
            $this->Flash->error(__('The treatment requirement renewal could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
