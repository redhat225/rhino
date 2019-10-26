<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RequirementIngredientFractions Controller
 *
 * @property \App\Model\Table\RequirementIngredientFractionsTable $RequirementIngredientFractions
 */
class RequirementIngredientFractionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['RequirementActiveFractions', 'RequirementActiveIngredients', 'RequirementCompositions']
        ];
        $requirementIngredientFractions = $this->paginate($this->RequirementIngredientFractions);

        $this->set(compact('requirementIngredientFractions'));
        $this->set('_serialize', ['requirementIngredientFractions']);
    }

    /**
     * View method
     *
     * @param string|null $id Requirement Ingredient Fraction id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $requirementIngredientFraction = $this->RequirementIngredientFractions->get($id, [
            'contain' => ['RequirementActiveFractions', 'RequirementActiveIngredients', 'RequirementCompositions']
        ]);

        $this->set('requirementIngredientFraction', $requirementIngredientFraction);
        $this->set('_serialize', ['requirementIngredientFraction']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $requirementIngredientFraction = $this->RequirementIngredientFractions->newEntity();
        if ($this->request->is('post')) {
            $requirementIngredientFraction = $this->RequirementIngredientFractions->patchEntity($requirementIngredientFraction, $this->request->data);
            if ($this->RequirementIngredientFractions->save($requirementIngredientFraction)) {
                $this->Flash->success(__('The requirement ingredient fraction has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The requirement ingredient fraction could not be saved. Please, try again.'));
            }
        }
        $requirementActiveFractions = $this->RequirementIngredientFractions->RequirementActiveFractions->find('list', ['limit' => 200]);
        $requirementActiveIngredients = $this->RequirementIngredientFractions->RequirementActiveIngredients->find('list', ['limit' => 200]);
        $requirementCompositions = $this->RequirementIngredientFractions->RequirementCompositions->find('list', ['limit' => 200]);
        $this->set(compact('requirementIngredientFraction', 'requirementActiveFractions', 'requirementActiveIngredients', 'requirementCompositions'));
        $this->set('_serialize', ['requirementIngredientFraction']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Requirement Ingredient Fraction id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $requirementIngredientFraction = $this->RequirementIngredientFractions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $requirementIngredientFraction = $this->RequirementIngredientFractions->patchEntity($requirementIngredientFraction, $this->request->data);
            if ($this->RequirementIngredientFractions->save($requirementIngredientFraction)) {
                $this->Flash->success(__('The requirement ingredient fraction has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The requirement ingredient fraction could not be saved. Please, try again.'));
            }
        }
        $requirementActiveFractions = $this->RequirementIngredientFractions->RequirementActiveFractions->find('list', ['limit' => 200]);
        $requirementActiveIngredients = $this->RequirementIngredientFractions->RequirementActiveIngredients->find('list', ['limit' => 200]);
        $requirementCompositions = $this->RequirementIngredientFractions->RequirementCompositions->find('list', ['limit' => 200]);
        $this->set(compact('requirementIngredientFraction', 'requirementActiveFractions', 'requirementActiveIngredients', 'requirementCompositions'));
        $this->set('_serialize', ['requirementIngredientFraction']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Requirement Ingredient Fraction id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $requirementIngredientFraction = $this->RequirementIngredientFractions->get($id);
        if ($this->RequirementIngredientFractions->delete($requirementIngredientFraction)) {
            $this->Flash->success(__('The requirement ingredient fraction has been deleted.'));
        } else {
            $this->Flash->error(__('The requirement ingredient fraction could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
