<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * InstitutionTypes Controller
 *
 * @property \App\Model\Table\InstitutionTypesTable $InstitutionTypes
 */
class InstitutionTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $institutionTypes = $this->paginate($this->InstitutionTypes);

        $this->set(compact('institutionTypes'));
        $this->set('_serialize', ['institutionTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Institution Type id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $institutionType = $this->InstitutionTypes->get($id, [
            'contain' => ['Institutions']
        ]);

        $this->set('institutionType', $institutionType);
        $this->set('_serialize', ['institutionType']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $institutionType = $this->InstitutionTypes->newEntity();
        if ($this->request->is('post')) {
            $institutionType = $this->InstitutionTypes->patchEntity($institutionType, $this->request->data);
            if ($this->InstitutionTypes->save($institutionType)) {
                $this->Flash->success(__('The institution type has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The institution type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('institutionType'));
        $this->set('_serialize', ['institutionType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Institution Type id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $institutionType = $this->InstitutionTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $institutionType = $this->InstitutionTypes->patchEntity($institutionType, $this->request->data);
            if ($this->InstitutionTypes->save($institutionType)) {
                $this->Flash->success(__('The institution type has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The institution type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('institutionType'));
        $this->set('_serialize', ['institutionType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Institution Type id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $institutionType = $this->InstitutionTypes->get($id);
        if ($this->InstitutionTypes->delete($institutionType)) {
            $this->Flash->success(__('The institution type has been deleted.'));
        } else {
            $this->Flash->error(__('The institution type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
