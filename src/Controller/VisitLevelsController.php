<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * VisitLevels Controller
 *
 * @property \App\Model\Table\VisitLevelsTable $VisitLevels
 */
class VisitLevelsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $visitLevels = $this->paginate($this->VisitLevels);

        $this->set(compact('visitLevels'));
        $this->set('_serialize', ['visitLevels']);
    }

    /**
     * View method
     *
     * @param string|null $id Visit Level id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $visitLevel = $this->VisitLevels->get($id, [
            'contain' => ['Visits']
        ]);

        $this->set('visitLevel', $visitLevel);
        $this->set('_serialize', ['visitLevel']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $visitLevel = $this->VisitLevels->newEntity();
        if ($this->request->is('post')) {
            $visitLevel = $this->VisitLevels->patchEntity($visitLevel, $this->request->data);
            if ($this->VisitLevels->save($visitLevel)) {
                $this->Flash->success(__('The visit level has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The visit level could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('visitLevel'));
        $this->set('_serialize', ['visitLevel']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Visit Level id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $visitLevel = $this->VisitLevels->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $visitLevel = $this->VisitLevels->patchEntity($visitLevel, $this->request->data);
            if ($this->VisitLevels->save($visitLevel)) {
                $this->Flash->success(__('The visit level has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The visit level could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('visitLevel'));
        $this->set('_serialize', ['visitLevel']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Visit Level id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $visitLevel = $this->VisitLevels->get($id);
        if ($this->VisitLevels->delete($visitLevel)) {
            $this->Flash->success(__('The visit level has been deleted.'));
        } else {
            $this->Flash->error(__('The visit level could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
