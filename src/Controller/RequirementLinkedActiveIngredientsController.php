<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RequirementLinkedActiveIngredients Controller
 *
 * @property \App\Model\Table\RequirementLinkedActiveIngredientsTable $RequirementLinkedActiveIngredients
 */
class RequirementLinkedActiveIngredientsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['RequirementCompositions', 'RequirementActiveIngredients']
        ];
        $requirementLinkedActiveIngredients = $this->paginate($this->RequirementLinkedActiveIngredients);

        $this->set(compact('requirementLinkedActiveIngredients'));
        $this->set('_serialize', ['requirementLinkedActiveIngredients']);
    }

    /**
     * View method
     *
     * @param string|null $id Requirement Linked Active Ingredient id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $requirementLinkedActiveIngredient = $this->RequirementLinkedActiveIngredients->get($id, [
            'contain' => ['RequirementCompositions', 'RequirementActiveIngredients']
        ]);

        $this->set('requirementLinkedActiveIngredient', $requirementLinkedActiveIngredient);
        $this->set('_serialize', ['requirementLinkedActiveIngredient']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $requirementLinkedActiveIngredient = $this->RequirementLinkedActiveIngredients->newEntity();
        if ($this->request->is('post')) {
            $requirementLinkedActiveIngredient = $this->RequirementLinkedActiveIngredients->patchEntity($requirementLinkedActiveIngredient, $this->request->data);
            if ($this->RequirementLinkedActiveIngredients->save($requirementLinkedActiveIngredient)) {
                $this->Flash->success(__('The requirement linked active ingredient has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The requirement linked active ingredient could not be saved. Please, try again.'));
            }
        }
        $requirementCompositions = $this->RequirementLinkedActiveIngredients->RequirementCompositions->find('list', ['limit' => 200]);
        $requirementActiveIngredients = $this->RequirementLinkedActiveIngredients->RequirementActiveIngredients->find('list', ['limit' => 200]);
        $this->set(compact('requirementLinkedActiveIngredient', 'requirementCompositions', 'requirementActiveIngredients'));
        $this->set('_serialize', ['requirementLinkedActiveIngredient']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Requirement Linked Active Ingredient id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $requirementLinkedActiveIngredient = $this->RequirementLinkedActiveIngredients->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $requirementLinkedActiveIngredient = $this->RequirementLinkedActiveIngredients->patchEntity($requirementLinkedActiveIngredient, $this->request->data);
            if ($this->RequirementLinkedActiveIngredients->save($requirementLinkedActiveIngredient)) {
                $this->Flash->success(__('The requirement linked active ingredient has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The requirement linked active ingredient could not be saved. Please, try again.'));
            }
        }
        $requirementCompositions = $this->RequirementLinkedActiveIngredients->RequirementCompositions->find('list', ['limit' => 200]);
        $requirementActiveIngredients = $this->RequirementLinkedActiveIngredients->RequirementActiveIngredients->find('list', ['limit' => 200]);
        $this->set(compact('requirementLinkedActiveIngredient', 'requirementCompositions', 'requirementActiveIngredients'));
        $this->set('_serialize', ['requirementLinkedActiveIngredient']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Requirement Linked Active Ingredient id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $requirementLinkedActiveIngredient = $this->RequirementLinkedActiveIngredients->get($id);
        if ($this->RequirementLinkedActiveIngredients->delete($requirementLinkedActiveIngredient)) {
            $this->Flash->success(__('The requirement linked active ingredient has been deleted.'));
        } else {
            $this->Flash->error(__('The requirement linked active ingredient could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
