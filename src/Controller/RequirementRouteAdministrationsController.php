<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RequirementRouteAdministrations Controller
 *
 * @property \App\Model\Table\RequirementRouteAdministrationsTable $RequirementRouteAdministrations
 */
class RequirementRouteAdministrationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['RequirementRouteAdministrationTypes', 'Requirements']
        ];
        $requirementRouteAdministrations = $this->paginate($this->RequirementRouteAdministrations);

        $this->set(compact('requirementRouteAdministrations'));
        $this->set('_serialize', ['requirementRouteAdministrations']);
    }

    /**
     * View method
     *
     * @param string|null $id Requirement Route Administration id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $requirementRouteAdministration = $this->RequirementRouteAdministrations->get($id, [
            'contain' => ['RequirementRouteAdministrationTypes', 'Requirements']
        ]);

        $this->set('requirementRouteAdministration', $requirementRouteAdministration);
        $this->set('_serialize', ['requirementRouteAdministration']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $requirementRouteAdministration = $this->RequirementRouteAdministrations->newEntity();
        if ($this->request->is('post')) {
            $requirementRouteAdministration = $this->RequirementRouteAdministrations->patchEntity($requirementRouteAdministration, $this->request->data);
            if ($this->RequirementRouteAdministrations->save($requirementRouteAdministration)) {
                $this->Flash->success(__('The requirement route administration has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The requirement route administration could not be saved. Please, try again.'));
            }
        }
        $requirementRouteAdministrationTypes = $this->RequirementRouteAdministrations->RequirementRouteAdministrationTypes->find('list', ['limit' => 200]);
        $requirements = $this->RequirementRouteAdministrations->Requirements->find('list', ['limit' => 200]);
        $this->set(compact('requirementRouteAdministration', 'requirementRouteAdministrationTypes', 'requirements'));
        $this->set('_serialize', ['requirementRouteAdministration']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Requirement Route Administration id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $requirementRouteAdministration = $this->RequirementRouteAdministrations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $requirementRouteAdministration = $this->RequirementRouteAdministrations->patchEntity($requirementRouteAdministration, $this->request->data);
            if ($this->RequirementRouteAdministrations->save($requirementRouteAdministration)) {
                $this->Flash->success(__('The requirement route administration has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The requirement route administration could not be saved. Please, try again.'));
            }
        }
        $requirementRouteAdministrationTypes = $this->RequirementRouteAdministrations->RequirementRouteAdministrationTypes->find('list', ['limit' => 200]);
        $requirements = $this->RequirementRouteAdministrations->Requirements->find('list', ['limit' => 200]);
        $this->set(compact('requirementRouteAdministration', 'requirementRouteAdministrationTypes', 'requirements'));
        $this->set('_serialize', ['requirementRouteAdministration']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Requirement Route Administration id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $requirementRouteAdministration = $this->RequirementRouteAdministrations->get($id);
        if ($this->RequirementRouteAdministrations->delete($requirementRouteAdministration)) {
            $this->Flash->success(__('The requirement route administration has been deleted.'));
        } else {
            $this->Flash->error(__('The requirement route administration could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
