<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * VisitStateOrderDetails Controller
 *
 * @property \App\Model\Table\VisitStateOrderDetailsTable $VisitStateOrderDetails
 */
class VisitStateOrderDetailsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['VisitStates', 'VisitStateOrderTypes']
        ];
        $visitStateOrderDetails = $this->paginate($this->VisitStateOrderDetails);

        $this->set(compact('visitStateOrderDetails'));
        $this->set('_serialize', ['visitStateOrderDetails']);
    }

    /**
     * View method
     *
     * @param string|null $id Visit State Order Detail id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $visitStateOrderDetail = $this->VisitStateOrderDetails->get($id, [
            'contain' => ['VisitStates', 'VisitStateOrderTypes']
        ]);

        $this->set('visitStateOrderDetail', $visitStateOrderDetail);
        $this->set('_serialize', ['visitStateOrderDetail']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $visitStateOrderDetail = $this->VisitStateOrderDetails->newEntity();
        if ($this->request->is('post')) {
            $visitStateOrderDetail = $this->VisitStateOrderDetails->patchEntity($visitStateOrderDetail, $this->request->data);
            if ($this->VisitStateOrderDetails->save($visitStateOrderDetail)) {
                $this->Flash->success(__('The visit state order detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The visit state order detail could not be saved. Please, try again.'));
            }
        }
        $visitStates = $this->VisitStateOrderDetails->VisitStates->find('list', ['limit' => 200]);
        $visitStateOrderTypes = $this->VisitStateOrderDetails->VisitStateOrderTypes->find('list', ['limit' => 200]);
        $this->set(compact('visitStateOrderDetail', 'visitStates', 'visitStateOrderTypes'));
        $this->set('_serialize', ['visitStateOrderDetail']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Visit State Order Detail id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $visitStateOrderDetail = $this->VisitStateOrderDetails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $visitStateOrderDetail = $this->VisitStateOrderDetails->patchEntity($visitStateOrderDetail, $this->request->data);
            if ($this->VisitStateOrderDetails->save($visitStateOrderDetail)) {
                $this->Flash->success(__('The visit state order detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The visit state order detail could not be saved. Please, try again.'));
            }
        }
        $visitStates = $this->VisitStateOrderDetails->VisitStates->find('list', ['limit' => 200]);
        $visitStateOrderTypes = $this->VisitStateOrderDetails->VisitStateOrderTypes->find('list', ['limit' => 200]);
        $this->set(compact('visitStateOrderDetail', 'visitStates', 'visitStateOrderTypes'));
        $this->set('_serialize', ['visitStateOrderDetail']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Visit State Order Detail id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $visitStateOrderDetail = $this->VisitStateOrderDetails->get($id);
        if ($this->VisitStateOrderDetails->delete($visitStateOrderDetail)) {
            $this->Flash->success(__('The visit state order detail has been deleted.'));
        } else {
            $this->Flash->error(__('The visit state order detail could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
