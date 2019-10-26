<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AuxiliaryActDetails Controller
 *
 * @property \App\Model\Table\AuxiliaryActDetailsTable $AuxiliaryActDetails
 */
class AuxiliaryActDetailsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Auxiliaries', 'AuxiliaryActs']
        ];
        $auxiliaryActDetails = $this->paginate($this->AuxiliaryActDetails);

        $this->set(compact('auxiliaryActDetails'));
        $this->set('_serialize', ['auxiliaryActDetails']);
    }

    /**
     * View method
     *
     * @param string|null $id Auxiliary Act Detail id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $auxiliaryActDetail = $this->AuxiliaryActDetails->get($id, [
            'contain' => ['Auxiliaries', 'AuxiliaryActs']
        ]);

        $this->set('auxiliaryActDetail', $auxiliaryActDetail);
        $this->set('_serialize', ['auxiliaryActDetail']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $auxiliaryActDetail = $this->AuxiliaryActDetails->newEntity();
        if ($this->request->is('post')) {
            $auxiliaryActDetail = $this->AuxiliaryActDetails->patchEntity($auxiliaryActDetail, $this->request->data);
            if ($this->AuxiliaryActDetails->save($auxiliaryActDetail)) {
                $this->Flash->success(__('The auxiliary act detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The auxiliary act detail could not be saved. Please, try again.'));
            }
        }
        $auxiliaries = $this->AuxiliaryActDetails->Auxiliaries->find('list', ['limit' => 200]);
        $auxiliaryActs = $this->AuxiliaryActDetails->AuxiliaryActs->find('list', ['limit' => 200]);
        $this->set(compact('auxiliaryActDetail', 'auxiliaries', 'auxiliaryActs'));
        $this->set('_serialize', ['auxiliaryActDetail']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Auxiliary Act Detail id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $auxiliaryActDetail = $this->AuxiliaryActDetails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $auxiliaryActDetail = $this->AuxiliaryActDetails->patchEntity($auxiliaryActDetail, $this->request->data);
            if ($this->AuxiliaryActDetails->save($auxiliaryActDetail)) {
                $this->Flash->success(__('The auxiliary act detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The auxiliary act detail could not be saved. Please, try again.'));
            }
        }
        $auxiliaries = $this->AuxiliaryActDetails->Auxiliaries->find('list', ['limit' => 200]);
        $auxiliaryActs = $this->AuxiliaryActDetails->AuxiliaryActs->find('list', ['limit' => 200]);
        $this->set(compact('auxiliaryActDetail', 'auxiliaries', 'auxiliaryActs'));
        $this->set('_serialize', ['auxiliaryActDetail']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Auxiliary Act Detail id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $auxiliaryActDetail = $this->AuxiliaryActDetails->get($id);
        if ($this->AuxiliaryActDetails->delete($auxiliaryActDetail)) {
            $this->Flash->success(__('The auxiliary act detail has been deleted.'));
        } else {
            $this->Flash->error(__('The auxiliary act detail could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
