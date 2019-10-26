<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RequirementHolders Controller
 *
 * @property \App\Model\Table\RequirementHoldersTable $RequirementHolders
 */
class RequirementHoldersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['CountryTownships']
        ];
        $requirementHolders = $this->paginate($this->RequirementHolders);

        $this->set(compact('requirementHolders'));
        $this->set('_serialize', ['requirementHolders']);
    }

    /**
     * View method
     *
     * @param string|null $id Requirement Holder id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $requirementHolder = $this->RequirementHolders->get($id, [
            'contain' => ['CountryTownships', 'RequirementHolderDetails']
        ]);

        $this->set('requirementHolder', $requirementHolder);
        $this->set('_serialize', ['requirementHolder']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $requirementHolder = $this->RequirementHolders->newEntity();
        if ($this->request->is('post')) {
            $requirementHolder = $this->RequirementHolders->patchEntity($requirementHolder, $this->request->data);
            if ($this->RequirementHolders->save($requirementHolder)) {
                $this->Flash->success(__('The requirement holder has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The requirement holder could not be saved. Please, try again.'));
            }
        }
        $countryTownships = $this->RequirementHolders->CountryTownships->find('list', ['limit' => 200]);
        $this->set(compact('requirementHolder', 'countryTownships'));
        $this->set('_serialize', ['requirementHolder']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Requirement Holder id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $requirementHolder = $this->RequirementHolders->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $requirementHolder = $this->RequirementHolders->patchEntity($requirementHolder, $this->request->data);
            if ($this->RequirementHolders->save($requirementHolder)) {
                $this->Flash->success(__('The requirement holder has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The requirement holder could not be saved. Please, try again.'));
            }
        }
        $countryTownships = $this->RequirementHolders->CountryTownships->find('list', ['limit' => 200]);
        $this->set(compact('requirementHolder', 'countryTownships'));
        $this->set('_serialize', ['requirementHolder']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Requirement Holder id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $requirementHolder = $this->RequirementHolders->get($id);
        if ($this->RequirementHolders->delete($requirementHolder)) {
            $this->Flash->success(__('The requirement holder has been deleted.'));
        } else {
            $this->Flash->error(__('The requirement holder could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
