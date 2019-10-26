<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PeopleSituations Controller
 *
 * @property \App\Model\Table\PeopleSituationsTable $PeopleSituations
 */
class PeopleSituationsController extends AppController
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
        $peopleSituations = $this->paginate($this->PeopleSituations);

        $this->set(compact('peopleSituations'));
        $this->set('_serialize', ['peopleSituations']);
    }

    /**
     * View method
     *
     * @param string|null $id People Situation id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $peopleSituation = $this->PeopleSituations->get($id, [
            'contain' => ['People']
        ]);

        $this->set('peopleSituation', $peopleSituation);
        $this->set('_serialize', ['peopleSituation']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $peopleSituation = $this->PeopleSituations->newEntity();
        if ($this->request->is('post')) {
            $peopleSituation = $this->PeopleSituations->patchEntity($peopleSituation, $this->request->data);
            if ($this->PeopleSituations->save($peopleSituation)) {
                $this->Flash->success(__('The people situation has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The people situation could not be saved. Please, try again.'));
            }
        }
        $people = $this->PeopleSituations->People->find('list', ['limit' => 200]);
        $this->set(compact('peopleSituation', 'people'));
        $this->set('_serialize', ['peopleSituation']);
    }

    /**
     * Edit method
     *
     * @param string|null $id People Situation id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $peopleSituation = $this->PeopleSituations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $peopleSituation = $this->PeopleSituations->patchEntity($peopleSituation, $this->request->data);
            if ($this->PeopleSituations->save($peopleSituation)) {
                $this->Flash->success(__('The people situation has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The people situation could not be saved. Please, try again.'));
            }
        }
        $people = $this->PeopleSituations->People->find('list', ['limit' => 200]);
        $this->set(compact('peopleSituation', 'people'));
        $this->set('_serialize', ['peopleSituation']);
    }

    /**
     * Delete method
     *
     * @param string|null $id People Situation id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $peopleSituation = $this->PeopleSituations->get($id);
        if ($this->PeopleSituations->delete($peopleSituation)) {
            $this->Flash->success(__('The people situation has been deleted.'));
        } else {
            $this->Flash->error(__('The people situation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
