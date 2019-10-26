<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PeopleDescendants Controller
 *
 * @property \App\Model\Table\PeopleDescendantsTable $PeopleDescendants
 */
class PeopleDescendantsController extends AppController
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
        $peopleDescendants = $this->paginate($this->PeopleDescendants);

        $this->set(compact('peopleDescendants'));
        $this->set('_serialize', ['peopleDescendants']);
    }

    /**
     * View method
     *
     * @param string|null $id People Descendant id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $peopleDescendant = $this->PeopleDescendants->get($id, [
            'contain' => ['People']
        ]);

        $this->set('peopleDescendant', $peopleDescendant);
        $this->set('_serialize', ['peopleDescendant']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $peopleDescendant = $this->PeopleDescendants->newEntity();
        if ($this->request->is('post')) {
            $peopleDescendant = $this->PeopleDescendants->patchEntity($peopleDescendant, $this->request->data);
            if ($this->PeopleDescendants->save($peopleDescendant)) {
                $this->Flash->success(__('The people descendant has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The people descendant could not be saved. Please, try again.'));
            }
        }
        $people = $this->PeopleDescendants->People->find('list', ['limit' => 200]);
        $this->set(compact('peopleDescendant', 'people'));
        $this->set('_serialize', ['peopleDescendant']);
    }

    /**
     * Edit method
     *
     * @param string|null $id People Descendant id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $peopleDescendant = $this->PeopleDescendants->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $peopleDescendant = $this->PeopleDescendants->patchEntity($peopleDescendant, $this->request->data);
            if ($this->PeopleDescendants->save($peopleDescendant)) {
                $this->Flash->success(__('The people descendant has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The people descendant could not be saved. Please, try again.'));
            }
        }
        $people = $this->PeopleDescendants->People->find('list', ['limit' => 200]);
        $this->set(compact('peopleDescendant', 'people'));
        $this->set('_serialize', ['peopleDescendant']);
    }

    /**
     * Delete method
     *
     * @param string|null $id People Descendant id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $peopleDescendant = $this->PeopleDescendants->get($id);
        if ($this->PeopleDescendants->delete($peopleDescendant)) {
            $this->Flash->success(__('The people descendant has been deleted.'));
        } else {
            $this->Flash->error(__('The people descendant could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
