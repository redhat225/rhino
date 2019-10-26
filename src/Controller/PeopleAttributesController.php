<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PeopleAttributes Controller
 *
 * @property \App\Model\Table\PeopleAttributesTable $PeopleAttributes
 */
class PeopleAttributesController extends AppController
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
        $peopleAttributes = $this->paginate($this->PeopleAttributes);

        $this->set(compact('peopleAttributes'));
        $this->set('_serialize', ['peopleAttributes']);
    }

    /**
     * View method
     *
     * @param string|null $id People Attribute id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $peopleAttribute = $this->PeopleAttributes->get($id, [
            'contain' => ['People']
        ]);

        $this->set('peopleAttribute', $peopleAttribute);
        $this->set('_serialize', ['peopleAttribute']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $peopleAttribute = $this->PeopleAttributes->newEntity();
        if ($this->request->is('post')) {
            $peopleAttribute = $this->PeopleAttributes->patchEntity($peopleAttribute, $this->request->data);
            if ($this->PeopleAttributes->save($peopleAttribute)) {
                $this->Flash->success(__('The people attribute has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The people attribute could not be saved. Please, try again.'));
            }
        }
        $people = $this->PeopleAttributes->People->find('list', ['limit' => 200]);
        $this->set(compact('peopleAttribute', 'people'));
        $this->set('_serialize', ['peopleAttribute']);
    }

    /**
     * Edit method
     *
     * @param string|null $id People Attribute id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $peopleAttribute = $this->PeopleAttributes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $peopleAttribute = $this->PeopleAttributes->patchEntity($peopleAttribute, $this->request->data);
            if ($this->PeopleAttributes->save($peopleAttribute)) {
                $this->Flash->success(__('The people attribute has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The people attribute could not be saved. Please, try again.'));
            }
        }
        $people = $this->PeopleAttributes->People->find('list', ['limit' => 200]);
        $this->set(compact('peopleAttribute', 'people'));
        $this->set('_serialize', ['peopleAttribute']);
    }

    /**
     * Delete method
     *
     * @param string|null $id People Attribute id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $peopleAttribute = $this->PeopleAttributes->get($id);
        if ($this->PeopleAttributes->delete($peopleAttribute)) {
            $this->Flash->success(__('The people attribute has been deleted.'));
        } else {
            $this->Flash->error(__('The people attribute could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
