<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RequirementInteractions Controller
 *
 * @property \App\Model\Table\RequirementInteractionsTable $RequirementInteractions
 */
class RequirementInteractionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['RequirementActiveIngredients', 'InteractionFamily1s', 'InteractionFamily2s']
        ];
        $requirementInteractions = $this->paginate($this->RequirementInteractions);

        $this->set(compact('requirementInteractions'));
        $this->set('_serialize', ['requirementInteractions']);
    }

    /**
     * View method
     *
     * @param string|null $id Requirement Interaction id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $requirementInteraction = $this->RequirementInteractions->get($id, [
            'contain' => ['RequirementActiveIngredients', 'InteractionFamily1s', 'InteractionFamily2s']
        ]);

        $this->set('requirementInteraction', $requirementInteraction);
        $this->set('_serialize', ['requirementInteraction']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $requirementInteraction = $this->RequirementInteractions->newEntity();
        if ($this->request->is('post')) {
            $requirementInteraction = $this->RequirementInteractions->patchEntity($requirementInteraction, $this->request->data);
            if ($this->RequirementInteractions->save($requirementInteraction)) {
                $this->Flash->success(__('The requirement interaction has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The requirement interaction could not be saved. Please, try again.'));
            }
        }
        $requirementActiveIngredients = $this->RequirementInteractions->RequirementActiveIngredients->find('list', ['limit' => 200]);
        $interactionFamily1s = $this->RequirementInteractions->InteractionFamily1s->find('list', ['limit' => 200]);
        $interactionFamily2s = $this->RequirementInteractions->InteractionFamily2s->find('list', ['limit' => 200]);
        $this->set(compact('requirementInteraction', 'requirementActiveIngredients', 'interactionFamily1s', 'interactionFamily2s'));
        $this->set('_serialize', ['requirementInteraction']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Requirement Interaction id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $requirementInteraction = $this->RequirementInteractions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $requirementInteraction = $this->RequirementInteractions->patchEntity($requirementInteraction, $this->request->data);
            if ($this->RequirementInteractions->save($requirementInteraction)) {
                $this->Flash->success(__('The requirement interaction has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The requirement interaction could not be saved. Please, try again.'));
            }
        }
        $requirementActiveIngredients = $this->RequirementInteractions->RequirementActiveIngredients->find('list', ['limit' => 200]);
        $interactionFamily1s = $this->RequirementInteractions->InteractionFamily1s->find('list', ['limit' => 200]);
        $interactionFamily2s = $this->RequirementInteractions->InteractionFamily2s->find('list', ['limit' => 200]);
        $this->set(compact('requirementInteraction', 'requirementActiveIngredients', 'interactionFamily1s', 'interactionFamily2s'));
        $this->set('_serialize', ['requirementInteraction']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Requirement Interaction id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $requirementInteraction = $this->RequirementInteractions->get($id);
        if ($this->RequirementInteractions->delete($requirementInteraction)) {
            $this->Flash->success(__('The requirement interaction has been deleted.'));
        } else {
            $this->Flash->error(__('The requirement interaction could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
