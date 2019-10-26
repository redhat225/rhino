<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DoctorSpecialities Controller
 *
 * @property \App\Model\Table\DoctorSpecialitiesTable $DoctorSpecialities
 */
class DoctorSpecialitiesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $doctorSpecialities = $this->paginate($this->DoctorSpecialities);

        $this->set(compact('doctorSpecialities'));
        $this->set('_serialize', ['doctorSpecialities']);
    }

    /**
     * View method
     *
     * @param string|null $id Doctor Speciality id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $doctorSpeciality = $this->DoctorSpecialities->get($id, [
            'contain' => ['DoctorSpecialityDetails']
        ]);

        $this->set('doctorSpeciality', $doctorSpeciality);
        $this->set('_serialize', ['doctorSpeciality']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $doctorSpeciality = $this->DoctorSpecialities->newEntity();
        if ($this->request->is('post')) {
            $doctorSpeciality = $this->DoctorSpecialities->patchEntity($doctorSpeciality, $this->request->data);
            if ($this->DoctorSpecialities->save($doctorSpeciality)) {
                $this->Flash->success(__('The doctor speciality has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The doctor speciality could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('doctorSpeciality'));
        $this->set('_serialize', ['doctorSpeciality']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Doctor Speciality id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $doctorSpeciality = $this->DoctorSpecialities->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $doctorSpeciality = $this->DoctorSpecialities->patchEntity($doctorSpeciality, $this->request->data);
            if ($this->DoctorSpecialities->save($doctorSpeciality)) {
                $this->Flash->success(__('The doctor speciality has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The doctor speciality could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('doctorSpeciality'));
        $this->set('_serialize', ['doctorSpeciality']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Doctor Speciality id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $doctorSpeciality = $this->DoctorSpecialities->get($id);
        if ($this->DoctorSpecialities->delete($doctorSpeciality)) {
            $this->Flash->success(__('The doctor speciality has been deleted.'));
        } else {
            $this->Flash->error(__('The doctor speciality could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
