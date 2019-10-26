<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Requirements Controller
 *
 * @property \App\Model\Table\RequirementsTable $Requirements
 */
class RequirementsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $requirements = $this->paginate($this->Requirements);

        $this->set(compact('requirements'));
        $this->set('_serialize', ['requirements']);
    }

    /**
     * View method
     *
     * @param string|null $id Requirement id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $requirement = $this->Requirements->get($id, [
            'contain' => ['RequirementCompositions', 'RequirementHolderDetails', 'RequirementIssueLists', 'RequirementPresentations', 'RequirementRouteAdministrations', 'RequirementSignificantInformations', 'TreatmentRequirements']
        ]);

        $this->set('requirement', $requirement);
        $this->set('_serialize', ['requirement']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $requirement = $this->Requirements->newEntity();
        if ($this->request->is('post')) {
            $requirement = $this->Requirements->patchEntity($requirement, $this->request->data);
            if ($this->Requirements->save($requirement)) {
                $this->Flash->success(__('The requirement has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The requirement could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('requirement'));
        $this->set('_serialize', ['requirement']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Requirement id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $requirement = $this->Requirements->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $requirement = $this->Requirements->patchEntity($requirement, $this->request->data);
            if ($this->Requirements->save($requirement)) {
                $this->Flash->success(__('The requirement has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The requirement could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('requirement'));
        $this->set('_serialize', ['requirement']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Requirement id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $requirement = $this->Requirements->get($id);
        if ($this->Requirements->delete($requirement)) {
            $this->Flash->success(__('The requirement has been deleted.'));
        } else {
            $this->Flash->error(__('The requirement could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
