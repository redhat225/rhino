<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * VisitOrderTypes Controller
 *
 * @property \App\Model\Table\VisitOrderTypesTable $VisitOrderTypes
 */
class VisitOrderTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $visitOrderTypes = $this->paginate($this->VisitOrderTypes);

        $this->set(compact('visitOrderTypes'));
        $this->set('_serialize', ['visitOrderTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Visit Order Type id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $visitOrderType = $this->VisitOrderTypes->get($id, [
            'contain' => ['VisitOrderDetails']
        ]);

        $this->set('visitOrderType', $visitOrderType);
        $this->set('_serialize', ['visitOrderType']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $visitOrderType = $this->VisitOrderTypes->newEntity();
        if ($this->request->is('post')) {
            $visitOrderType = $this->VisitOrderTypes->patchEntity($visitOrderType, $this->request->data);
            if ($this->VisitOrderTypes->save($visitOrderType)) {
                $this->Flash->success(__('The visit order type has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The visit order type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('visitOrderType'));
        $this->set('_serialize', ['visitOrderType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Visit Order Type id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $visitOrderType = $this->VisitOrderTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $visitOrderType = $this->VisitOrderTypes->patchEntity($visitOrderType, $this->request->data);
            if ($this->VisitOrderTypes->save($visitOrderType)) {
                $this->Flash->success(__('The visit order type has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The visit order type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('visitOrderType'));
        $this->set('_serialize', ['visitOrderType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Visit Order Type id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $visitOrderType = $this->VisitOrderTypes->get($id);
        if ($this->VisitOrderTypes->delete($visitOrderType)) {
            $this->Flash->success(__('The visit order type has been deleted.'));
        } else {
            $this->Flash->error(__('The visit order type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
