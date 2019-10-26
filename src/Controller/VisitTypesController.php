<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * VisitTypes Controller
 *
 * @property \App\Model\Table\VisitTypesTable $VisitTypes
 */
class VisitTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $visitTypes = $this->paginate($this->VisitTypes);

        $this->set(compact('visitTypes'));
        $this->set('_serialize', ['visitTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Visit Type id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $visitType = $this->VisitTypes->get($id, [
            'contain' => ['VisitTypeDetails']
        ]);

        $this->set('visitType', $visitType);
        $this->set('_serialize', ['visitType']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $visitType = $this->VisitTypes->newEntity();
        if ($this->request->is('post')) {
            $visitType = $this->VisitTypes->patchEntity($visitType, $this->request->data);
            if ($this->VisitTypes->save($visitType)) {
                $this->Flash->success(__('The visit type has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The visit type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('visitType'));
        $this->set('_serialize', ['visitType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Visit Type id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $visitType = $this->VisitTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $visitType = $this->VisitTypes->patchEntity($visitType, $this->request->data);
            if ($this->VisitTypes->save($visitType)) {
                $this->Flash->success(__('The visit type has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The visit type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('visitType'));
        $this->set('_serialize', ['visitType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Visit Type id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $visitType = $this->VisitTypes->get($id);
        if ($this->VisitTypes->delete($visitType)) {
            $this->Flash->success(__('The visit type has been deleted.'));
        } else {
            $this->Flash->error(__('The visit type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
