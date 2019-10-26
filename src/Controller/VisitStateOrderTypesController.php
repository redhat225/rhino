<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * VisitStateOrderTypes Controller
 *
 * @property \App\Model\Table\VisitStateOrderTypesTable $VisitStateOrderTypes
 */
class VisitStateOrderTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $visitStateOrderTypes = $this->paginate($this->VisitStateOrderTypes);

        $this->set(compact('visitStateOrderTypes'));
        $this->set('_serialize', ['visitStateOrderTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Visit State Order Type id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $visitStateOrderType = $this->VisitStateOrderTypes->get($id, [
            'contain' => ['VisitStates']
        ]);

        $this->set('visitStateOrderType', $visitStateOrderType);
        $this->set('_serialize', ['visitStateOrderType']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $visitStateOrderType = $this->VisitStateOrderTypes->newEntity();
        if ($this->request->is('post')) {
            $visitStateOrderType = $this->VisitStateOrderTypes->patchEntity($visitStateOrderType, $this->request->data);
            if ($this->VisitStateOrderTypes->save($visitStateOrderType)) {
                $this->Flash->success(__('The visit state order type has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The visit state order type could not be saved. Please, try again.'));
            }
        }
        $visitStates = $this->VisitStateOrderTypes->VisitStates->find('list', ['limit' => 200]);
        $this->set(compact('visitStateOrderType', 'visitStates'));
        $this->set('_serialize', ['visitStateOrderType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Visit State Order Type id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $visitStateOrderType = $this->VisitStateOrderTypes->get($id, [
            'contain' => ['VisitStates']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $visitStateOrderType = $this->VisitStateOrderTypes->patchEntity($visitStateOrderType, $this->request->data);
            if ($this->VisitStateOrderTypes->save($visitStateOrderType)) {
                $this->Flash->success(__('The visit state order type has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The visit state order type could not be saved. Please, try again.'));
            }
        }
        $visitStates = $this->VisitStateOrderTypes->VisitStates->find('list', ['limit' => 200]);
        $this->set(compact('visitStateOrderType', 'visitStates'));
        $this->set('_serialize', ['visitStateOrderType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Visit State Order Type id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $visitStateOrderType = $this->VisitStateOrderTypes->get($id);
        if ($this->VisitStateOrderTypes->delete($visitStateOrderType)) {
            $this->Flash->success(__('The visit state order type has been deleted.'));
        } else {
            $this->Flash->error(__('The visit state order type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
