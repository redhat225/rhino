<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TreatmentRequirements Controller
 *
 * @property \App\Model\Table\TreatmentRequirementsTable $TreatmentRequirements
 */
class TreatmentRequirementsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Treatments']
        ];
        $treatmentRequirements = $this->paginate($this->TreatmentRequirements);

        $this->set(compact('treatmentRequirements'));
        $this->set('_serialize', ['treatmentRequirements']);
    }

    /**
     * View method
     *
     * @param string|null $id Treatment Requirement id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $treatmentRequirement = $this->TreatmentRequirements->get($id, [
            'contain' => ['Treatments']
        ]);

        $this->set('treatmentRequirement', $treatmentRequirement);
        $this->set('_serialize', ['treatmentRequirement']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $treatmentRequirement = $this->TreatmentRequirements->newEntity();
        if ($this->request->is('post')) {
            $treatmentRequirement = $this->TreatmentRequirements->patchEntity($treatmentRequirement, $this->request->data);
            if ($this->TreatmentRequirements->save($treatmentRequirement)) {
                $this->Flash->success(__('The treatment requirement has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The treatment requirement could not be saved. Please, try again.'));
            }
        }
        $treatments = $this->TreatmentRequirements->Treatments->find('list', ['limit' => 200]);
        $this->set(compact('treatmentRequirement', 'treatments'));
        $this->set('_serialize', ['treatmentRequirement']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Treatment Requirement id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $treatmentRequirement = $this->TreatmentRequirements->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $treatmentRequirement = $this->TreatmentRequirements->patchEntity($treatmentRequirement, $this->request->data);
            if ($this->TreatmentRequirements->save($treatmentRequirement)) {
                $this->Flash->success(__('The treatment requirement has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The treatment requirement could not be saved. Please, try again.'));
            }
        }
        $treatments = $this->TreatmentRequirements->Treatments->find('list', ['limit' => 200]);
        $this->set(compact('treatmentRequirement', 'treatments'));
        $this->set('_serialize', ['treatmentRequirement']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Treatment Requirement id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $treatmentRequirement = $this->TreatmentRequirements->get($id);
        if ($this->TreatmentRequirements->delete($treatmentRequirement)) {
            $this->Flash->success(__('The treatment requirement has been deleted.'));
        } else {
            $this->Flash->error(__('The treatment requirement could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
