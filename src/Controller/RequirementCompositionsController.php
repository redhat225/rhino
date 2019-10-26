<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RequirementCompositions Controller
 *
 * @property \App\Model\Table\RequirementCompositionsTable $RequirementCompositions
 */
class RequirementCompositionsController extends AppController
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
        $requirementCompositions = $this->paginate($this->RequirementCompositions);

        $this->set(compact('requirementCompositions'));
        $this->set('_serialize', ['requirementCompositions']);
    }

    /**
     * View method
     *
     * @param string|null $id Requirement Composition id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $requirementComposition = $this->RequirementCompositions->get($id, [
            'contain' => ['Requirements', 'RequirementIngredientFractions', 'RequirementLinkedActiveIngredients']
        ]);

        $this->set('requirementComposition', $requirementComposition);
        $this->set('_serialize', ['requirementComposition']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $requirementComposition = $this->RequirementCompositions->newEntity();
        if ($this->request->is('post')) {
            $requirementComposition = $this->RequirementCompositions->patchEntity($requirementComposition, $this->request->data);
            if ($this->RequirementCompositions->save($requirementComposition)) {
                $this->Flash->success(__('The requirement composition has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The requirement composition could not be saved. Please, try again.'));
            }
        }
        $requirements = $this->RequirementCompositions->Requirements->find('list', ['limit' => 200]);
        $this->set(compact('requirementComposition', 'requirements'));
        $this->set('_serialize', ['requirementComposition']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Requirement Composition id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $requirementComposition = $this->RequirementCompositions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $requirementComposition = $this->RequirementCompositions->patchEntity($requirementComposition, $this->request->data);
            if ($this->RequirementCompositions->save($requirementComposition)) {
                $this->Flash->success(__('The requirement composition has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The requirement composition could not be saved. Please, try again.'));
            }
        }
        $requirements = $this->RequirementCompositions->Requirements->find('list', ['limit' => 200]);
        $this->set(compact('requirementComposition', 'requirements'));
        $this->set('_serialize', ['requirementComposition']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Requirement Composition id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $requirementComposition = $this->RequirementCompositions->get($id);
        if ($this->RequirementCompositions->delete($requirementComposition)) {
            $this->Flash->success(__('The requirement composition has been deleted.'));
        } else {
            $this->Flash->error(__('The requirement composition could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
