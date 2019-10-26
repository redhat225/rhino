<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PeopleCredentials Controller
 *
 * @property \App\Model\Table\PeopleCredentialsTable $PeopleCredentials
 */
class PeopleCredentialsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['People']
        ];
        $peopleCredentials = $this->paginate($this->PeopleCredentials);

        $this->set(compact('peopleCredentials'));
        $this->set('_serialize', ['peopleCredentials']);
    }

    /**
     * View method
     *
     * @param string|null $id People Credential id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $peopleCredential = $this->PeopleCredentials->get($id, [
            'contain' => ['People']
        ]);

        $this->set('peopleCredential', $peopleCredential);
        $this->set('_serialize', ['peopleCredential']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $peopleCredential = $this->PeopleCredentials->newEntity();
        if ($this->request->is('post')) {
            $peopleCredential = $this->PeopleCredentials->patchEntity($peopleCredential, $this->request->data);
            if ($this->PeopleCredentials->save($peopleCredential)) {
                $this->Flash->success(__('The people credential has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The people credential could not be saved. Please, try again.'));
            }
        }
        $people = $this->PeopleCredentials->People->find('list', ['limit' => 200]);
        $this->set(compact('peopleCredential', 'people'));
        $this->set('_serialize', ['peopleCredential']);
    }

    /**
     * Edit method
     *
     * @param string|null $id People Credential id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $peopleCredential = $this->PeopleCredentials->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $peopleCredential = $this->PeopleCredentials->patchEntity($peopleCredential, $this->request->data);
            if ($this->PeopleCredentials->save($peopleCredential)) {
                $this->Flash->success(__('The people credential has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The people credential could not be saved. Please, try again.'));
            }
        }
        $people = $this->PeopleCredentials->People->find('list', ['limit' => 200]);
        $this->set(compact('peopleCredential', 'people'));
        $this->set('_serialize', ['peopleCredential']);
    }

    /**
     * Delete method
     *
     * @param string|null $id People Credential id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $peopleCredential = $this->PeopleCredentials->get($id);
        if ($this->PeopleCredentials->delete($peopleCredential)) {
            $this->Flash->success(__('The people credential has been deleted.'));
        } else {
            $this->Flash->error(__('The people credential could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
