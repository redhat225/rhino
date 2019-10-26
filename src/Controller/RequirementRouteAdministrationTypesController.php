<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RequirementRouteAdministrationTypes Controller
 *
 * @property \App\Model\Table\RequirementRouteAdministrationTypesTable $RequirementRouteAdministrationTypes
 */
class RequirementRouteAdministrationTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $requirementRouteAdministrationTypes = $this->paginate($this->RequirementRouteAdministrationTypes);

        $this->set(compact('requirementRouteAdministrationTypes'));
        $this->set('_serialize', ['requirementRouteAdministrationTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Requirement Route Administration Type id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $requirementRouteAdministrationType = $this->RequirementRouteAdministrationTypes->get($id, [
            'contain' => ['RequirementRouteAdministrations']
        ]);

        $this->set('requirementRouteAdministrationType', $requirementRouteAdministrationType);
        $this->set('_serialize', ['requirementRouteAdministrationType']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $requirementRouteAdministrationType = $this->RequirementRouteAdministrationTypes->newEntity();
        if ($this->request->is('post')) {
            $requirementRouteAdministrationType = $this->RequirementRouteAdministrationTypes->patchEntity($requirementRouteAdministrationType, $this->request->data);
            if ($this->RequirementRouteAdministrationTypes->save($requirementRouteAdministrationType)) {
                $this->Flash->success(__('The requirement route administration type has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The requirement route administration type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('requirementRouteAdministrationType'));
        $this->set('_serialize', ['requirementRouteAdministrationType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Requirement Route Administration Type id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $requirementRouteAdministrationType = $this->RequirementRouteAdministrationTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $requirementRouteAdministrationType = $this->RequirementRouteAdministrationTypes->patchEntity($requirementRouteAdministrationType, $this->request->data);
            if ($this->RequirementRouteAdministrationTypes->save($requirementRouteAdministrationType)) {
                $this->Flash->success(__('The requirement route administration type has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The requirement route administration type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('requirementRouteAdministrationType'));
        $this->set('_serialize', ['requirementRouteAdministrationType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Requirement Route Administration Type id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $requirementRouteAdministrationType = $this->RequirementRouteAdministrationTypes->get($id);
        if ($this->RequirementRouteAdministrationTypes->delete($requirementRouteAdministrationType)) {
            $this->Flash->success(__('The requirement route administration type has been deleted.'));
        } else {
            $this->Flash->error(__('The requirement route administration type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
