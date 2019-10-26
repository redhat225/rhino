<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * InstitutionAdresses Controller
 *
 * @property \App\Model\Table\InstitutionAdressesTable $InstitutionAdresses
 */
class InstitutionAdressesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Institutions']
        ];
        $institutionAdresses = $this->paginate($this->InstitutionAdresses);

        $this->set(compact('institutionAdresses'));
        $this->set('_serialize', ['institutionAdresses']);
    }

    /**
     * View method
     *
     * @param string|null $id Institution Adress id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $institutionAdress = $this->InstitutionAdresses->get($id, [
            'contain' => ['Institutions']
        ]);

        $this->set('institutionAdress', $institutionAdress);
        $this->set('_serialize', ['institutionAdress']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $institutionAdress = $this->InstitutionAdresses->newEntity();
        if ($this->request->is('post')) {
            $institutionAdress = $this->InstitutionAdresses->patchEntity($institutionAdress, $this->request->data);
            if ($this->InstitutionAdresses->save($institutionAdress)) {
                $this->Flash->success(__('The institution adress has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The institution adress could not be saved. Please, try again.'));
            }
        }
        $institutions = $this->InstitutionAdresses->Institutions->find('list', ['limit' => 200]);
        $this->set(compact('institutionAdress', 'institutions'));
        $this->set('_serialize', ['institutionAdress']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Institution Adress id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $institutionAdress = $this->InstitutionAdresses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $institutionAdress = $this->InstitutionAdresses->patchEntity($institutionAdress, $this->request->data);
            if ($this->InstitutionAdresses->save($institutionAdress)) {
                $this->Flash->success(__('The institution adress has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The institution adress could not be saved. Please, try again.'));
            }
        }
        $institutions = $this->InstitutionAdresses->Institutions->find('list', ['limit' => 200]);
        $this->set(compact('institutionAdress', 'institutions'));
        $this->set('_serialize', ['institutionAdress']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Institution Adress id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $institutionAdress = $this->InstitutionAdresses->get($id);
        if ($this->InstitutionAdresses->delete($institutionAdress)) {
            $this->Flash->success(__('The institution adress has been deleted.'));
        } else {
            $this->Flash->error(__('The institution adress could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
