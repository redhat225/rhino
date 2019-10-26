<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * VisitStates Controller
 *
 * @property \App\Model\Table\VisitStatesTable $VisitStates
 */
class VisitStatesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['VisitStateTypes', 'Visits', 'VisitLevels', 'VisitKindTransports']
        ];
        $visitStates = $this->paginate($this->VisitStates);

        $this->set(compact('visitStates'));
        $this->set('_serialize', ['visitStates']);
    }

    /**
     * View method
     *
     * @param string|null $id Visit State id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $visitState = $this->VisitStates->get($id, [
            'contain' => ['VisitStateTypes', 'Visits', 'VisitLevels', 'VisitKindTransports', 'VisitStateOrderDetails']
        ]);

        $this->set('visitState', $visitState);
        $this->set('_serialize', ['visitState']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $visitState = $this->VisitStates->newEntity();
        if ($this->request->is('post')) {
            $visitState = $this->VisitStates->patchEntity($visitState, $this->request->data);
            if ($this->VisitStates->save($visitState)) {
                $this->Flash->success(__('The visit state has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The visit state could not be saved. Please, try again.'));
            }
        }
        $visitStateTypes = $this->VisitStates->VisitStateTypes->find('list', ['limit' => 200]);
        $visits = $this->VisitStates->Visits->find('list', ['limit' => 200]);
        $visitLevels = $this->VisitStates->VisitLevels->find('list', ['limit' => 200]);
        $visitKindTransports = $this->VisitStates->VisitKindTransports->find('list', ['limit' => 200]);
        $this->set(compact('visitState', 'visitStateTypes', 'visits', 'visitLevels', 'visitKindTransports'));
        $this->set('_serialize', ['visitState']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Visit State id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $visitState = $this->VisitStates->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $visitState = $this->VisitStates->patchEntity($visitState, $this->request->data);
            if ($this->VisitStates->save($visitState)) {
                $this->Flash->success(__('The visit state has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The visit state could not be saved. Please, try again.'));
            }
        }
        $visitStateTypes = $this->VisitStates->VisitStateTypes->find('list', ['limit' => 200]);
        $visits = $this->VisitStates->Visits->find('list', ['limit' => 200]);
        $visitLevels = $this->VisitStates->VisitLevels->find('list', ['limit' => 200]);
        $visitKindTransports = $this->VisitStates->VisitKindTransports->find('list', ['limit' => 200]);
        $this->set(compact('visitState', 'visitStateTypes', 'visits', 'visitLevels', 'visitKindTransports'));
        $this->set('_serialize', ['visitState']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Visit State id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $visitState = $this->VisitStates->get($id);
        if ($this->VisitStates->delete($visitState)) {
            $this->Flash->success(__('The visit state has been deleted.'));
        } else {
            $this->Flash->error(__('The visit state could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
