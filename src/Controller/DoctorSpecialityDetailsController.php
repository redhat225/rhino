<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DoctorSpecialityDetails Controller
 *
 * @property \App\Model\Table\DoctorSpecialityDetailsTable $DoctorSpecialityDetails
 */
class DoctorSpecialityDetailsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['DoctorSpecialities', 'Doctors']
        ];
        $doctorSpecialityDetails = $this->paginate($this->DoctorSpecialityDetails);

        $this->set(compact('doctorSpecialityDetails'));
        $this->set('_serialize', ['doctorSpecialityDetails']);
    }

    /**
     * View method
     *
     * @param string|null $id Doctor Speciality Detail id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $doctorSpecialityDetail = $this->DoctorSpecialityDetails->get($id, [
            'contain' => ['DoctorSpecialities', 'Doctors']
        ]);

        $this->set('doctorSpecialityDetail', $doctorSpecialityDetail);
        $this->set('_serialize', ['doctorSpecialityDetail']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $doctorSpecialityDetail = $this->DoctorSpecialityDetails->newEntity();
        if ($this->request->is('post')) {
            $doctorSpecialityDetail = $this->DoctorSpecialityDetails->patchEntity($doctorSpecialityDetail, $this->request->data);
            if ($this->DoctorSpecialityDetails->save($doctorSpecialityDetail)) {
                $this->Flash->success(__('The doctor speciality detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The doctor speciality detail could not be saved. Please, try again.'));
            }
        }
        $doctorSpecialities = $this->DoctorSpecialityDetails->DoctorSpecialities->find('list', ['limit' => 200]);
        $doctors = $this->DoctorSpecialityDetails->Doctors->find('list', ['limit' => 200]);
        $this->set(compact('doctorSpecialityDetail', 'doctorSpecialities', 'doctors'));
        $this->set('_serialize', ['doctorSpecialityDetail']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Doctor Speciality Detail id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $doctorSpecialityDetail = $this->DoctorSpecialityDetails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $doctorSpecialityDetail = $this->DoctorSpecialityDetails->patchEntity($doctorSpecialityDetail, $this->request->data);
            if ($this->DoctorSpecialityDetails->save($doctorSpecialityDetail)) {
                $this->Flash->success(__('The doctor speciality detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The doctor speciality detail could not be saved. Please, try again.'));
            }
        }
        $doctorSpecialities = $this->DoctorSpecialityDetails->DoctorSpecialities->find('list', ['limit' => 200]);
        $doctors = $this->DoctorSpecialityDetails->Doctors->find('list', ['limit' => 200]);
        $this->set(compact('doctorSpecialityDetail', 'doctorSpecialities', 'doctors'));
        $this->set('_serialize', ['doctorSpecialityDetail']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Doctor Speciality Detail id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $doctorSpecialityDetail = $this->DoctorSpecialityDetails->get($id);
        if ($this->DoctorSpecialityDetails->delete($doctorSpecialityDetail)) {
            $this->Flash->success(__('The doctor speciality detail has been deleted.'));
        } else {
            $this->Flash->error(__('The doctor speciality detail could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
