<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RequirementSignificantInformations Controller
 *
 * @property \App\Model\Table\RequirementSignificantInformationsTable $RequirementSignificantInformations
 */
class RequirementSignificantInformationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Requirements']
        ];
        $requirementSignificantInformations = $this->paginate($this->RequirementSignificantInformations);

        $this->set(compact('requirementSignificantInformations'));
        $this->set('_serialize', ['requirementSignificantInformations']);
    }

    /**
     * View method
     *
     * @param string|null $id Requirement Significant Information id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $requirementSignificantInformation = $this->RequirementSignificantInformations->get($id, [
            'contain' => ['Requirements']
        ]);

        $this->set('requirementSignificantInformation', $requirementSignificantInformation);
        $this->set('_serialize', ['requirementSignificantInformation']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $requirementSignificantInformation = $this->RequirementSignificantInformations->newEntity();
        if ($this->request->is('post')) {
            $requirementSignificantInformation = $this->RequirementSignificantInformations->patchEntity($requirementSignificantInformation, $this->request->data);
            if ($this->RequirementSignificantInformations->save($requirementSignificantInformation)) {
                $this->Flash->success(__('The requirement significant information has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The requirement significant information could not be saved. Please, try again.'));
            }
        }
        $requirements = $this->RequirementSignificantInformations->Requirements->find('list', ['limit' => 200]);
        $this->set(compact('requirementSignificantInformation', 'requirements'));
        $this->set('_serialize', ['requirementSignificantInformation']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Requirement Significant Information id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $requirementSignificantInformation = $this->RequirementSignificantInformations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $requirementSignificantInformation = $this->RequirementSignificantInformations->patchEntity($requirementSignificantInformation, $this->request->data);
            if ($this->RequirementSignificantInformations->save($requirementSignificantInformation)) {
                $this->Flash->success(__('The requirement significant information has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The requirement significant information could not be saved. Please, try again.'));
            }
        }
        $requirements = $this->RequirementSignificantInformations->Requirements->find('list', ['limit' => 200]);
        $this->set(compact('requirementSignificantInformation', 'requirements'));
        $this->set('_serialize', ['requirementSignificantInformation']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Requirement Significant Information id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $requirementSignificantInformation = $this->RequirementSignificantInformations->get($id);
        if ($this->RequirementSignificantInformations->delete($requirementSignificantInformation)) {
            $this->Flash->success(__('The requirement significant information has been deleted.'));
        } else {
            $this->Flash->error(__('The requirement significant information could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
