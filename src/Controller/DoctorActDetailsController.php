<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DoctorActDetails Controller
 *
 * @property \App\Model\Table\DoctorActDetailsTable $DoctorActDetails
 */
class DoctorActDetailsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Doctors', 'DoctorActs']
        ];
        $doctorActDetails = $this->paginate($this->DoctorActDetails);

        $this->set(compact('doctorActDetails'));
        $this->set('_serialize', ['doctorActDetails']);
    }

    /**
     * View method
     *
     * @param string|null $id Doctor Act Detail id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $doctorActDetail = $this->DoctorActDetails->get($id, [
            'contain' => ['Doctors', 'DoctorActs']
        ]);

        $this->set('doctorActDetail', $doctorActDetail);
        $this->set('_serialize', ['doctorActDetail']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $doctorActDetail = $this->DoctorActDetails->newEntity();
        if ($this->request->is('post')) {
            $doctorActDetail = $this->DoctorActDetails->patchEntity($doctorActDetail, $this->request->data);
            if ($this->DoctorActDetails->save($doctorActDetail)) {
                $this->Flash->success(__('The doctor act detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The doctor act detail could not be saved. Please, try again.'));
            }
        }
        $doctors = $this->DoctorActDetails->Doctors->find('list', ['limit' => 200]);
        $doctorActs = $this->DoctorActDetails->DoctorActs->find('list', ['limit' => 200]);
        $this->set(compact('doctorActDetail', 'doctors', 'doctorActs'));
        $this->set('_serialize', ['doctorActDetail']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Doctor Act Detail id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $doctorActDetail = $this->DoctorActDetails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $doctorActDetail = $this->DoctorActDetails->patchEntity($doctorActDetail, $this->request->data);
            if ($this->DoctorActDetails->save($doctorActDetail)) {
                $this->Flash->success(__('The doctor act detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The doctor act detail could not be saved. Please, try again.'));
            }
        }
        $doctors = $this->DoctorActDetails->Doctors->find('list', ['limit' => 200]);
        $doctorActs = $this->DoctorActDetails->DoctorActs->find('list', ['limit' => 200]);
        $this->set(compact('doctorActDetail', 'doctors', 'doctorActs'));
        $this->set('_serialize', ['doctorActDetail']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Doctor Act Detail id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $doctorActDetail = $this->DoctorActDetails->get($id);
        if ($this->DoctorActDetails->delete($doctorActDetail)) {
            $this->Flash->success(__('The doctor act detail has been deleted.'));
        } else {
            $this->Flash->error(__('The doctor act detail could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
