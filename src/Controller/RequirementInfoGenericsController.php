<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RequirementInfoGenerics Controller
 *
 * @property \App\Model\Table\RequirementInfoGenericsTable $RequirementInfoGenerics
 */
class RequirementInfoGenericsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['RequirementInfoGenericGroups']
        ];
        $requirementInfoGenerics = $this->paginate($this->RequirementInfoGenerics);

        $this->set(compact('requirementInfoGenerics'));
        $this->set('_serialize', ['requirementInfoGenerics']);
    }

    /**
     * View method
     *
     * @param string|null $id Requirement Info Generic id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $requirementInfoGeneric = $this->RequirementInfoGenerics->get($id, [
            'contain' => ['RequirementInfoGenericGroups']
        ]);

        $this->set('requirementInfoGeneric', $requirementInfoGeneric);
        $this->set('_serialize', ['requirementInfoGeneric']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $requirementInfoGeneric = $this->RequirementInfoGenerics->newEntity();
        if ($this->request->is('post')) {
            $requirementInfoGeneric = $this->RequirementInfoGenerics->patchEntity($requirementInfoGeneric, $this->request->data);
            if ($this->RequirementInfoGenerics->save($requirementInfoGeneric)) {
                $this->Flash->success(__('The requirement info generic has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The requirement info generic could not be saved. Please, try again.'));
            }
        }
        $requirementInfoGenericGroups = $this->RequirementInfoGenerics->RequirementInfoGenericGroups->find('list', ['limit' => 200]);
        $this->set(compact('requirementInfoGeneric', 'requirementInfoGenericGroups'));
        $this->set('_serialize', ['requirementInfoGeneric']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Requirement Info Generic id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $requirementInfoGeneric = $this->RequirementInfoGenerics->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $requirementInfoGeneric = $this->RequirementInfoGenerics->patchEntity($requirementInfoGeneric, $this->request->data);
            if ($this->RequirementInfoGenerics->save($requirementInfoGeneric)) {
                $this->Flash->success(__('The requirement info generic has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The requirement info generic could not be saved. Please, try again.'));
            }
        }
        $requirementInfoGenericGroups = $this->RequirementInfoGenerics->RequirementInfoGenericGroups->find('list', ['limit' => 200]);
        $this->set(compact('requirementInfoGeneric', 'requirementInfoGenericGroups'));
        $this->set('_serialize', ['requirementInfoGeneric']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Requirement Info Generic id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $requirementInfoGeneric = $this->RequirementInfoGenerics->get($id);
        if ($this->RequirementInfoGenerics->delete($requirementInfoGeneric)) {
            $this->Flash->success(__('The requirement info generic has been deleted.'));
        } else {
            $this->Flash->error(__('The requirement info generic could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
