<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RequirementHolderDetails Controller
 *
 * @property \App\Model\Table\RequirementHolderDetailsTable $RequirementHolderDetails
 */
class RequirementHolderDetailsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['RequirementHolders', 'Requirements']
        ];
        $requirementHolderDetails = $this->paginate($this->RequirementHolderDetails);

        $this->set(compact('requirementHolderDetails'));
        $this->set('_serialize', ['requirementHolderDetails']);
    }

    /**
     * View method
     *
     * @param string|null $id Requirement Holder Detail id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $requirementHolderDetail = $this->RequirementHolderDetails->get($id, [
            'contain' => ['RequirementHolders', 'Requirements']
        ]);

        $this->set('requirementHolderDetail', $requirementHolderDetail);
        $this->set('_serialize', ['requirementHolderDetail']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $requirementHolderDetail = $this->RequirementHolderDetails->newEntity();
        if ($this->request->is('post')) {
            $requirementHolderDetail = $this->RequirementHolderDetails->patchEntity($requirementHolderDetail, $this->request->data);
            if ($this->RequirementHolderDetails->save($requirementHolderDetail)) {
                $this->Flash->success(__('The requirement holder detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The requirement holder detail could not be saved. Please, try again.'));
            }
        }
        $requirementHolders = $this->RequirementHolderDetails->RequirementHolders->find('list', ['limit' => 200]);
        $requirements = $this->RequirementHolderDetails->Requirements->find('list', ['limit' => 200]);
        $this->set(compact('requirementHolderDetail', 'requirementHolders', 'requirements'));
        $this->set('_serialize', ['requirementHolderDetail']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Requirement Holder Detail id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $requirementHolderDetail = $this->RequirementHolderDetails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $requirementHolderDetail = $this->RequirementHolderDetails->patchEntity($requirementHolderDetail, $this->request->data);
            if ($this->RequirementHolderDetails->save($requirementHolderDetail)) {
                $this->Flash->success(__('The requirement holder detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The requirement holder detail could not be saved. Please, try again.'));
            }
        }
        $requirementHolders = $this->RequirementHolderDetails->RequirementHolders->find('list', ['limit' => 200]);
        $requirements = $this->RequirementHolderDetails->Requirements->find('list', ['limit' => 200]);
        $this->set(compact('requirementHolderDetail', 'requirementHolders', 'requirements'));
        $this->set('_serialize', ['requirementHolderDetail']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Requirement Holder Detail id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $requirementHolderDetail = $this->RequirementHolderDetails->get($id);
        if ($this->RequirementHolderDetails->delete($requirementHolderDetail)) {
            $this->Flash->success(__('The requirement holder detail has been deleted.'));
        } else {
            $this->Flash->error(__('The requirement holder detail could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
