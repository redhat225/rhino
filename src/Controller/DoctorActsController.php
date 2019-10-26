<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DoctorActs Controller
 *
 * @property \App\Model\Table\DoctorActsTable $DoctorActs
 */
class DoctorActsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $doctorActs = $this->paginate($this->DoctorActs);

        $this->set(compact('doctorActs'));
        $this->set('_serialize', ['doctorActs']);
    }

    /**
     * View method
     *
     * @param string|null $id Doctor Act id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $doctorAct = $this->DoctorActs->get($id, [
            'contain' => ['DoctorActDetails']
        ]);

        $this->set('doctorAct', $doctorAct);
        $this->set('_serialize', ['doctorAct']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $doctorAct = $this->DoctorActs->newEntity();
        if ($this->request->is('post')) {
            $doctorAct = $this->DoctorActs->patchEntity($doctorAct, $this->request->data);
            if ($this->DoctorActs->save($doctorAct)) {
                $this->Flash->success(__('The doctor act has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The doctor act could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('doctorAct'));
        $this->set('_serialize', ['doctorAct']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Doctor Act id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $doctorAct = $this->DoctorActs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $doctorAct = $this->DoctorActs->patchEntity($doctorAct, $this->request->data);
            if ($this->DoctorActs->save($doctorAct)) {
                $this->Flash->success(__('The doctor act has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The doctor act could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('doctorAct'));
        $this->set('_serialize', ['doctorAct']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Doctor Act id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $doctorAct = $this->DoctorActs->get($id);
        if ($this->DoctorActs->delete($doctorAct)) {
            $this->Flash->success(__('The doctor act has been deleted.'));
        } else {
            $this->Flash->error(__('The doctor act could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
