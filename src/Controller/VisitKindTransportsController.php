<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * VisitKindTransports Controller
 *
 * @property \App\Model\Table\VisitKindTransportsTable $VisitKindTransports
 */
class VisitKindTransportsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $visitKindTransports = $this->paginate($this->VisitKindTransports);

        $this->set(compact('visitKindTransports'));
        $this->set('_serialize', ['visitKindTransports']);
    }

    /**
     * View method
     *
     * @param string|null $id Visit Kind Transport id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $visitKindTransport = $this->VisitKindTransports->get($id, [
            'contain' => ['Visits']
        ]);

        $this->set('visitKindTransport', $visitKindTransport);
        $this->set('_serialize', ['visitKindTransport']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $visitKindTransport = $this->VisitKindTransports->newEntity();
        if ($this->request->is('post')) {
            $visitKindTransport = $this->VisitKindTransports->patchEntity($visitKindTransport, $this->request->data);
            if ($this->VisitKindTransports->save($visitKindTransport)) {
                $this->Flash->success(__('The visit kind transport has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The visit kind transport could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('visitKindTransport'));
        $this->set('_serialize', ['visitKindTransport']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Visit Kind Transport id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $visitKindTransport = $this->VisitKindTransports->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $visitKindTransport = $this->VisitKindTransports->patchEntity($visitKindTransport, $this->request->data);
            if ($this->VisitKindTransports->save($visitKindTransport)) {
                $this->Flash->success(__('The visit kind transport has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The visit kind transport could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('visitKindTransport'));
        $this->set('_serialize', ['visitKindTransport']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Visit Kind Transport id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $visitKindTransport = $this->VisitKindTransports->get($id);
        if ($this->VisitKindTransports->delete($visitKindTransport)) {
            $this->Flash->success(__('The visit kind transport has been deleted.'));
        } else {
            $this->Flash->error(__('The visit kind transport could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
