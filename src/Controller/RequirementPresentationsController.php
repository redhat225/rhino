<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RequirementPresentations Controller
 *
 * @property \App\Model\Table\RequirementPresentationsTable $RequirementPresentations
 */
class RequirementPresentationsController extends AppController
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
        $requirementPresentations = $this->paginate($this->RequirementPresentations);

        $this->set(compact('requirementPresentations'));
        $this->set('_serialize', ['requirementPresentations']);
    }

    /**
     * View method
     *
     * @param string|null $id Requirement Presentation id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $requirementPresentation = $this->RequirementPresentations->get($id, [
            'contain' => ['Requirements']
        ]);

        $this->set('requirementPresentation', $requirementPresentation);
        $this->set('_serialize', ['requirementPresentation']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $requirementPresentation = $this->RequirementPresentations->newEntity();
        if ($this->request->is('post')) {
            $requirementPresentation = $this->RequirementPresentations->patchEntity($requirementPresentation, $this->request->data);
            if ($this->RequirementPresentations->save($requirementPresentation)) {
                $this->Flash->success(__('The requirement presentation has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The requirement presentation could not be saved. Please, try again.'));
            }
        }
        $requirements = $this->RequirementPresentations->Requirements->find('list', ['limit' => 200]);
        $this->set(compact('requirementPresentation', 'requirements'));
        $this->set('_serialize', ['requirementPresentation']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Requirement Presentation id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $requirementPresentation = $this->RequirementPresentations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $requirementPresentation = $this->RequirementPresentations->patchEntity($requirementPresentation, $this->request->data);
            if ($this->RequirementPresentations->save($requirementPresentation)) {
                $this->Flash->success(__('The requirement presentation has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The requirement presentation could not be saved. Please, try again.'));
            }
        }
        $requirements = $this->RequirementPresentations->Requirements->find('list', ['limit' => 200]);
        $this->set(compact('requirementPresentation', 'requirements'));
        $this->set('_serialize', ['requirementPresentation']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Requirement Presentation id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $requirementPresentation = $this->RequirementPresentations->get($id);
        if ($this->RequirementPresentations->delete($requirementPresentation)) {
            $this->Flash->success(__('The requirement presentation has been deleted.'));
        } else {
            $this->Flash->error(__('The requirement presentation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
