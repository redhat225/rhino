<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PeopleAdresses Controller
 *
 * @property \App\Model\Table\PeopleAdressesTable $PeopleAdresses
 */
class PeopleAdressesController extends AppController
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
        $peopleAdresses = $this->paginate($this->PeopleAdresses);

        $this->set(compact('peopleAdresses'));
        $this->set('_serialize', ['peopleAdresses']);
    }

    /**
     * View method
     *
     * @param string|null $id People Adress id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $peopleAdress = $this->PeopleAdresses->get($id, [
            'contain' => ['People']
        ]);

        $this->set('peopleAdress', $peopleAdress);
        $this->set('_serialize', ['peopleAdress']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $peopleAdress = $this->PeopleAdresses->newEntity();
        if ($this->request->is('post')) {
            $peopleAdress = $this->PeopleAdresses->patchEntity($peopleAdress, $this->request->data);
            if ($this->PeopleAdresses->save($peopleAdress)) {
                $this->Flash->success(__('The people adress has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The people adress could not be saved. Please, try again.'));
            }
        }
        $people = $this->PeopleAdresses->People->find('list', ['limit' => 200]);
        $this->set(compact('peopleAdress', 'people'));
        $this->set('_serialize', ['peopleAdress']);
    }

    /**
     * Edit method
     *
     * @param string|null $id People Adress id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $peopleAdress = $this->PeopleAdresses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $peopleAdress = $this->PeopleAdresses->patchEntity($peopleAdress, $this->request->data);
            if ($this->PeopleAdresses->save($peopleAdress)) {
                $this->Flash->success(__('The people adress has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The people adress could not be saved. Please, try again.'));
            }
        }
        $people = $this->PeopleAdresses->People->find('list', ['limit' => 200]);
        $this->set(compact('peopleAdress', 'people'));
        $this->set('_serialize', ['peopleAdress']);
    }

    /**
     * Delete method
     *
     * @param string|null $id People Adress id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $peopleAdress = $this->PeopleAdresses->get($id);
        if ($this->PeopleAdresses->delete($peopleAdress)) {
            $this->Flash->success(__('The people adress has been deleted.'));
        } else {
            $this->Flash->error(__('The people adress could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
