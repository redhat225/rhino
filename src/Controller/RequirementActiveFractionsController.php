<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RequirementActiveFractions Controller
 *
 * @property \App\Model\Table\RequirementActiveFractionsTable $RequirementActiveFractions
 */
class RequirementActiveFractionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $requirementActiveFractions = $this->paginate($this->RequirementActiveFractions);

        $this->set(compact('requirementActiveFractions'));
        $this->set('_serialize', ['requirementActiveFractions']);
    }

    /**
     * View method
     *
     * @param string|null $id Requirement Active Fraction id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $requirementActiveFraction = $this->RequirementActiveFractions->get($id, [
            'contain' => ['RequirementIngredientFractions']
        ]);

        $this->set('requirementActiveFraction', $requirementActiveFraction);
        $this->set('_serialize', ['requirementActiveFraction']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $requirementActiveFraction = $this->RequirementActiveFractions->newEntity();
        if ($this->request->is('post')) {
            $requirementActiveFraction = $this->RequirementActiveFractions->patchEntity($requirementActiveFraction, $this->request->data);
            if ($this->RequirementActiveFractions->save($requirementActiveFraction)) {
                $this->Flash->success(__('The requirement active fraction has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The requirement active fraction could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('requirementActiveFraction'));
        $this->set('_serialize', ['requirementActiveFraction']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Requirement Active Fraction id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $requirementActiveFraction = $this->RequirementActiveFractions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $requirementActiveFraction = $this->RequirementActiveFractions->patchEntity($requirementActiveFraction, $this->request->data);
            if ($this->RequirementActiveFractions->save($requirementActiveFraction)) {
                $this->Flash->success(__('The requirement active fraction has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The requirement active fraction could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('requirementActiveFraction'));
        $this->set('_serialize', ['requirementActiveFraction']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Requirement Active Fraction id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $requirementActiveFraction = $this->RequirementActiveFractions->get($id);
        if ($this->RequirementActiveFractions->delete($requirementActiveFraction)) {
            $this->Flash->success(__('The requirement active fraction has been deleted.'));
        } else {
            $this->Flash->error(__('The requirement active fraction could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
