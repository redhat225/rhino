<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RequirementInfoGenericGroups Controller
 *
 * @property \App\Model\Table\RequirementInfoGenericGroupsTable $RequirementInfoGenericGroups
 */
class RequirementInfoGenericGroupsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $requirementInfoGenericGroups = $this->paginate($this->RequirementInfoGenericGroups);

        $this->set(compact('requirementInfoGenericGroups'));
        $this->set('_serialize', ['requirementInfoGenericGroups']);
    }

    /**
     * View method
     *
     * @param string|null $id Requirement Info Generic Group id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $requirementInfoGenericGroup = $this->RequirementInfoGenericGroups->get($id, [
            'contain' => ['RequirementInfoGenerics']
        ]);

        $this->set('requirementInfoGenericGroup', $requirementInfoGenericGroup);
        $this->set('_serialize', ['requirementInfoGenericGroup']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $requirementInfoGenericGroup = $this->RequirementInfoGenericGroups->newEntity();
        if ($this->request->is('post')) {
            $requirementInfoGenericGroup = $this->RequirementInfoGenericGroups->patchEntity($requirementInfoGenericGroup, $this->request->data);
            if ($this->RequirementInfoGenericGroups->save($requirementInfoGenericGroup)) {
                $this->Flash->success(__('The requirement info generic group has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The requirement info generic group could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('requirementInfoGenericGroup'));
        $this->set('_serialize', ['requirementInfoGenericGroup']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Requirement Info Generic Group id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $requirementInfoGenericGroup = $this->RequirementInfoGenericGroups->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $requirementInfoGenericGroup = $this->RequirementInfoGenericGroups->patchEntity($requirementInfoGenericGroup, $this->request->data);
            if ($this->RequirementInfoGenericGroups->save($requirementInfoGenericGroup)) {
                $this->Flash->success(__('The requirement info generic group has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The requirement info generic group could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('requirementInfoGenericGroup'));
        $this->set('_serialize', ['requirementInfoGenericGroup']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Requirement Info Generic Group id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $requirementInfoGenericGroup = $this->RequirementInfoGenericGroups->get($id);
        if ($this->RequirementInfoGenericGroups->delete($requirementInfoGenericGroup)) {
            $this->Flash->success(__('The requirement info generic group has been deleted.'));
        } else {
            $this->Flash->error(__('The requirement info generic group could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
