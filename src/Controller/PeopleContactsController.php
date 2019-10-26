<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PeopleContacts Controller
 *
 * @property \App\Model\Table\PeopleContactsTable $PeopleContacts
 */
class PeopleContactsController extends AppController
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
        $peopleContacts = $this->paginate($this->PeopleContacts);

        $this->set(compact('peopleContacts'));
        $this->set('_serialize', ['peopleContacts']);
    }

    /**
     * View method
     *
     * @param string|null $id People Contact id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $peopleContact = $this->PeopleContacts->get($id, [
            'contain' => ['People']
        ]);

        $this->set('peopleContact', $peopleContact);
        $this->set('_serialize', ['peopleContact']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $peopleContact = $this->PeopleContacts->newEntity();
        if ($this->request->is('post')) {
            $peopleContact = $this->PeopleContacts->patchEntity($peopleContact, $this->request->data);
            if ($this->PeopleContacts->save($peopleContact)) {
                $this->Flash->success(__('The people contact has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The people contact could not be saved. Please, try again.'));
            }
        }
        $people = $this->PeopleContacts->People->find('list', ['limit' => 200]);
        $this->set(compact('peopleContact', 'people'));
        $this->set('_serialize', ['peopleContact']);
    }

    /**
     * Edit method
     *
     * @param string|null $id People Contact id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $peopleContact = $this->PeopleContacts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $peopleContact = $this->PeopleContacts->patchEntity($peopleContact, $this->request->data);
            if ($this->PeopleContacts->save($peopleContact)) {
                $this->Flash->success(__('The people contact has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The people contact could not be saved. Please, try again.'));
            }
        }
        $people = $this->PeopleContacts->People->find('list', ['limit' => 200]);
        $this->set(compact('peopleContact', 'people'));
        $this->set('_serialize', ['peopleContact']);
    }

    /**
     * Delete method
     *
     * @param string|null $id People Contact id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $peopleContact = $this->PeopleContacts->get($id);
        if ($this->PeopleContacts->delete($peopleContact)) {
            $this->Flash->success(__('The people contact has been deleted.'));
        } else {
            $this->Flash->error(__('The people contact could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
