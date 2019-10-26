<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RequirementIssueLists Controller
 *
 * @property \App\Model\Table\RequirementIssueListsTable $RequirementIssueLists
 */
class RequirementIssueListsController extends AppController
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
        $requirementIssueLists = $this->paginate($this->RequirementIssueLists);

        $this->set(compact('requirementIssueLists'));
        $this->set('_serialize', ['requirementIssueLists']);
    }

    /**
     * View method
     *
     * @param string|null $id Requirement Issue List id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $requirementIssueList = $this->RequirementIssueLists->get($id, [
            'contain' => ['Requirements']
        ]);

        $this->set('requirementIssueList', $requirementIssueList);
        $this->set('_serialize', ['requirementIssueList']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $requirementIssueList = $this->RequirementIssueLists->newEntity();
        if ($this->request->is('post')) {
            $requirementIssueList = $this->RequirementIssueLists->patchEntity($requirementIssueList, $this->request->data);
            if ($this->RequirementIssueLists->save($requirementIssueList)) {
                $this->Flash->success(__('The requirement issue list has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The requirement issue list could not be saved. Please, try again.'));
            }
        }
        $requirements = $this->RequirementIssueLists->Requirements->find('list', ['limit' => 200]);
        $this->set(compact('requirementIssueList', 'requirements'));
        $this->set('_serialize', ['requirementIssueList']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Requirement Issue List id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $requirementIssueList = $this->RequirementIssueLists->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $requirementIssueList = $this->RequirementIssueLists->patchEntity($requirementIssueList, $this->request->data);
            if ($this->RequirementIssueLists->save($requirementIssueList)) {
                $this->Flash->success(__('The requirement issue list has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The requirement issue list could not be saved. Please, try again.'));
            }
        }
        $requirements = $this->RequirementIssueLists->Requirements->find('list', ['limit' => 200]);
        $this->set(compact('requirementIssueList', 'requirements'));
        $this->set('_serialize', ['requirementIssueList']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Requirement Issue List id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $requirementIssueList = $this->RequirementIssueLists->get($id);
        if ($this->RequirementIssueLists->delete($requirementIssueList)) {
            $this->Flash->success(__('The requirement issue list has been deleted.'));
        } else {
            $this->Flash->error(__('The requirement issue list could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
