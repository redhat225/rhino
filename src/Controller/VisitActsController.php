<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * VisitActs Controller
 *
 * @property \App\Model\Table\VisitActsTable $VisitActs
 */
class VisitActsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['VisitActSubCategories']
        ];
        $visitActs = $this->paginate($this->VisitActs);

        $this->set(compact('visitActs'));
        $this->set('_serialize', ['visitActs']);
    }

    /**
     * View method
     *
     * @param string|null $id Visit Act id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $visitAct = $this->VisitActs->get($id, [
            'contain' => ['VisitActSubCategories', 'VisitActAuxiliaryDetails', 'VisitActDoctorDetails']
        ]);

        $this->set('visitAct', $visitAct);
        $this->set('_serialize', ['visitAct']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $visitAct = $this->VisitActs->newEntity();
        if ($this->request->is('post')) {
            $visitAct = $this->VisitActs->patchEntity($visitAct, $this->request->data);
            if ($this->VisitActs->save($visitAct)) {
                $this->Flash->success(__('The visit act has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The visit act could not be saved. Please, try again.'));
            }
        }
        $visitActSubCategories = $this->VisitActs->VisitActSubCategories->find('list', ['limit' => 200]);
        $this->set(compact('visitAct', 'visitActSubCategories'));
        $this->set('_serialize', ['visitAct']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Visit Act id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $visitAct = $this->VisitActs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $visitAct = $this->VisitActs->patchEntity($visitAct, $this->request->data);
            if ($this->VisitActs->save($visitAct)) {
                $this->Flash->success(__('The visit act has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The visit act could not be saved. Please, try again.'));
            }
        }
        $visitActSubCategories = $this->VisitActs->VisitActSubCategories->find('list', ['limit' => 200]);
        $this->set(compact('visitAct', 'visitActSubCategories'));
        $this->set('_serialize', ['visitAct']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Visit Act id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $visitAct = $this->VisitActs->get($id);
        if ($this->VisitActs->delete($visitAct)) {
            $this->Flash->success(__('The visit act has been deleted.'));
        } else {
            $this->Flash->error(__('The visit act could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
