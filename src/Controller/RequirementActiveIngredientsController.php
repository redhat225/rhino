<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RequirementActiveIngredients Controller
 *
 * @property \App\Model\Table\RequirementActiveIngredientsTable $RequirementActiveIngredients
 */
class RequirementActiveIngredientsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $requirementActiveIngredients = $this->paginate($this->RequirementActiveIngredients);

        $this->set(compact('requirementActiveIngredients'));
        $this->set('_serialize', ['requirementActiveIngredients']);
    }

    /**
     * View method
     *
     * @param string|null $id Requirement Active Ingredient id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $requirementActiveIngredient = $this->RequirementActiveIngredients->get($id, [
            'contain' => ['RequirementIngredientFractions', 'RequirementInteractions', 'RequirementLinkedActiveIngredients']
        ]);

        $this->set('requirementActiveIngredient', $requirementActiveIngredient);
        $this->set('_serialize', ['requirementActiveIngredient']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $requirementActiveIngredient = $this->RequirementActiveIngredients->newEntity();
        if ($this->request->is('post')) {
            $requirementActiveIngredient = $this->RequirementActiveIngredients->patchEntity($requirementActiveIngredient, $this->request->data);
            if ($this->RequirementActiveIngredients->save($requirementActiveIngredient)) {
                $this->Flash->success(__('The requirement active ingredient has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The requirement active ingredient could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('requirementActiveIngredient'));
        $this->set('_serialize', ['requirementActiveIngredient']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Requirement Active Ingredient id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $requirementActiveIngredient = $this->RequirementActiveIngredients->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $requirementActiveIngredient = $this->RequirementActiveIngredients->patchEntity($requirementActiveIngredient, $this->request->data);
            if ($this->RequirementActiveIngredients->save($requirementActiveIngredient)) {
                $this->Flash->success(__('The requirement active ingredient has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The requirement active ingredient could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('requirementActiveIngredient'));
        $this->set('_serialize', ['requirementActiveIngredient']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Requirement Active Ingredient id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $requirementActiveIngredient = $this->RequirementActiveIngredients->get($id);
        if ($this->RequirementActiveIngredients->delete($requirementActiveIngredient)) {
            $this->Flash->success(__('The requirement active ingredient has been deleted.'));
        } else {
            $this->Flash->error(__('The requirement active ingredient could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
