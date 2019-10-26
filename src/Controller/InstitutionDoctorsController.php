<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * InstitutionDoctors Controller
 *
 * @property \App\Model\Table\InstitutionDoctorsTable $InstitutionDoctors
 */
class InstitutionDoctorsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Institutions', 'Doctors']
        ];
        $institutionDoctors = $this->paginate($this->InstitutionDoctors);

        $this->set(compact('institutionDoctors'));
        $this->set('_serialize', ['institutionDoctors']);
    }

    /**
     * View method
     *
     * @param string|null $id Institution Doctor id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $institutionDoctor = $this->InstitutionDoctors->get($id, [
            'contain' => ['Institutions', 'Doctors', 'DoctorSpecialities']
        ]);

        $this->set('institutionDoctor', $institutionDoctor);
        $this->set('_serialize', ['institutionDoctor']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $institutionDoctor = $this->InstitutionDoctors->newEntity();
        if ($this->request->is('post')) {
            $institutionDoctor = $this->InstitutionDoctors->patchEntity($institutionDoctor, $this->request->data);
            if ($this->InstitutionDoctors->save($institutionDoctor)) {
                $this->Flash->success(__('The institution doctor has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The institution doctor could not be saved. Please, try again.'));
            }
        }
        $institutions = $this->InstitutionDoctors->Institutions->find('list', ['limit' => 200]);
        $doctors = $this->InstitutionDoctors->Doctors->find('list', ['limit' => 200]);
        $this->set(compact('institutionDoctor', 'institutions', 'doctors'));
        $this->set('_serialize', ['institutionDoctor']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Institution Doctor id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $institutionDoctor = $this->InstitutionDoctors->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $institutionDoctor = $this->InstitutionDoctors->patchEntity($institutionDoctor, $this->request->data);
            if ($this->InstitutionDoctors->save($institutionDoctor)) {
                $this->Flash->success(__('The institution doctor has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The institution doctor could not be saved. Please, try again.'));
            }
        }
        $institutions = $this->InstitutionDoctors->Institutions->find('list', ['limit' => 200]);
        $doctors = $this->InstitutionDoctors->Doctors->find('list', ['limit' => 200]);
        $this->set(compact('institutionDoctor', 'institutions', 'doctors'));
        $this->set('_serialize', ['institutionDoctor']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Institution Doctor id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $institutionDoctor = $this->InstitutionDoctors->get($id);
        if ($this->InstitutionDoctors->delete($institutionDoctor)) {
            $this->Flash->success(__('The institution doctor has been deleted.'));
        } else {
            $this->Flash->error(__('The institution doctor could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
