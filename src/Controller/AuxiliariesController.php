<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Auxiliaries Controller
 *
 * @property \App\Model\Table\AuxiliariesTable $Auxiliaries
 */
class AuxiliariesController extends AppController
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
        $auxiliaries = $this->paginate($this->Auxiliaries);

        $this->set(compact('auxiliaries'));
        $this->set('_serialize', ['auxiliaries']);
    }

    /**
     * View method
     *
     * @param string|null $id Auxiliary id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $auxiliary = $this->Auxiliaries->get($id, [
            'contain' => ['People', 'AuxiliaryActDetails', 'AuxiliaryRoleDetails', 'VisitConstants', 'VisitInterventionAuxiliaries', 'VisitTasks']
        ]);

        $this->set('auxiliary', $auxiliary);
        $this->set('_serialize', ['auxiliary']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $auxiliary = $this->Auxiliaries->newEntity();
        if ($this->request->is('post')) {
            $auxiliary = $this->Auxiliaries->patchEntity($auxiliary, $this->request->data);
            if ($this->Auxiliaries->save($auxiliary)) {
                $this->Flash->success(__('The auxiliary has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The auxiliary could not be saved. Please, try again.'));
            }
        }
        $people = $this->Auxiliaries->People->find('list', ['limit' => 200]);
        $this->set(compact('auxiliary', 'people'));
        $this->set('_serialize', ['auxiliary']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Auxiliary id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $auxiliary = $this->Auxiliaries->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $auxiliary = $this->Auxiliaries->patchEntity($auxiliary, $this->request->data);
            if ($this->Auxiliaries->save($auxiliary)) {
                $this->Flash->success(__('The auxiliary has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The auxiliary could not be saved. Please, try again.'));
            }
        }
        $people = $this->Auxiliaries->People->find('list', ['limit' => 200]);
        $this->set(compact('auxiliary', 'people'));
        $this->set('_serialize', ['auxiliary']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Auxiliary id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $auxiliary = $this->Auxiliaries->get($id);
        if ($this->Auxiliaries->delete($auxiliary)) {
            $this->Flash->success(__('The auxiliary has been deleted.'));
        } else {
            $this->Flash->error(__('The auxiliary could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
