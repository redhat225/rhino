<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TreatmentRequirementSpecifications Controller
 *
 * @property \App\Model\Table\TreatmentRequirementSpecificationsTable $TreatmentRequirementSpecifications
 */
class TreatmentRequirementSpecificationsController extends AppController
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
        $treatmentRequirementSpecifications = $this->paginate($this->TreatmentRequirementSpecifications);

        $this->set(compact('treatmentRequirementSpecifications'));
        $this->set('_serialize', ['treatmentRequirementSpecifications']);
    }

    /**
     * View method
     *
     * @param string|null $id Treatment Requirement Specification id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $treatmentRequirementSpecification = $this->TreatmentRequirementSpecifications->get($id, [
            'contain' => ['TreatmentRequirements']
        ]);

        $this->set('treatmentRequirementSpecification', $treatmentRequirementSpecification);
        $this->set('_serialize', ['treatmentRequirementSpecification']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $treatmentRequirementSpecification = $this->TreatmentRequirementSpecifications->newEntity();
        if ($this->request->is('post')) {
            $treatmentRequirementSpecification = $this->TreatmentRequirementSpecifications->patchEntity($treatmentRequirementSpecification, $this->request->data);
            if ($this->TreatmentRequirementSpecifications->save($treatmentRequirementSpecification)) {
                $this->Flash->success(__('The treatment requirement specification has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The treatment requirement specification could not be saved. Please, try again.'));
            }
        }
        $treatmentRequirements = $this->TreatmentRequirementSpecifications->TreatmentRequirements->find('list', ['limit' => 200]);
        $this->set(compact('treatmentRequirementSpecification', 'treatmentRequirements'));
        $this->set('_serialize', ['treatmentRequirementSpecification']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Treatment Requirement Specification id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $treatmentRequirementSpecification = $this->TreatmentRequirementSpecifications->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $treatmentRequirementSpecification = $this->TreatmentRequirementSpecifications->patchEntity($treatmentRequirementSpecification, $this->request->data);
            if ($this->TreatmentRequirementSpecifications->save($treatmentRequirementSpecification)) {
                $this->Flash->success(__('The treatment requirement specification has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The treatment requirement specification could not be saved. Please, try again.'));
            }
        }
        $treatmentRequirements = $this->TreatmentRequirementSpecifications->TreatmentRequirements->find('list', ['limit' => 200]);
        $this->set(compact('treatmentRequirementSpecification', 'treatmentRequirements'));
        $this->set('_serialize', ['treatmentRequirementSpecification']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Treatment Requirement Specification id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $treatmentRequirementSpecification = $this->TreatmentRequirementSpecifications->get($id);
        if ($this->TreatmentRequirementSpecifications->delete($treatmentRequirementSpecification)) {
            $this->Flash->success(__('The treatment requirement specification has been deleted.'));
        } else {
            $this->Flash->error(__('The treatment requirement specification could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
