<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AuxiliaryActs Controller
 *
 * @property \App\Model\Table\AuxiliaryActsTable $AuxiliaryActs
 */
class AuxiliaryActsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $auxiliaryActs = $this->paginate($this->AuxiliaryActs);

        $this->set(compact('auxiliaryActs'));
        $this->set('_serialize', ['auxiliaryActs']);
    }

    /**
     * View method
     *
     * @param string|null $id Auxiliary Act id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $auxiliaryAct = $this->AuxiliaryActs->get($id, [
            'contain' => ['AuxiliaryActDetails']
        ]);

        $this->set('auxiliaryAct', $auxiliaryAct);
        $this->set('_serialize', ['auxiliaryAct']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $auxiliaryAct = $this->AuxiliaryActs->newEntity();
        if ($this->request->is('post')) {
            $auxiliaryAct = $this->AuxiliaryActs->patchEntity($auxiliaryAct, $this->request->data);
            if ($this->AuxiliaryActs->save($auxiliaryAct)) {
                $this->Flash->success(__('The auxiliary act has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The auxiliary act could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('auxiliaryAct'));
        $this->set('_serialize', ['auxiliaryAct']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Auxiliary Act id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $auxiliaryAct = $this->AuxiliaryActs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $auxiliaryAct = $this->AuxiliaryActs->patchEntity($auxiliaryAct, $this->request->data);
            if ($this->AuxiliaryActs->save($auxiliaryAct)) {
                $this->Flash->success(__('The auxiliary act has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The auxiliary act could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('auxiliaryAct'));
        $this->set('_serialize', ['auxiliaryAct']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Auxiliary Act id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $auxiliaryAct = $this->AuxiliaryActs->get($id);
        if ($this->AuxiliaryActs->delete($auxiliaryAct)) {
            $this->Flash->success(__('The auxiliary act has been deleted.'));
        } else {
            $this->Flash->error(__('The auxiliary act could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
