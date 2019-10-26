<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DoctorSpecialityTypes Controller
 *
 * @property \App\Model\Table\DoctorSpecialityTypesTable $DoctorSpecialityTypes
 */
class DoctorSpecialityTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $doctorSpecialityTypes = $this->paginate($this->DoctorSpecialityTypes);

        $this->set(compact('doctorSpecialityTypes'));
        $this->set('_serialize', ['doctorSpecialityTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Doctor Speciality Type id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $doctorSpecialityType = $this->DoctorSpecialityTypes->get($id, [
            'contain' => []
        ]);

        $this->set('doctorSpecialityType', $doctorSpecialityType);
        $this->set('_serialize', ['doctorSpecialityType']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $doctorSpecialityType = $this->DoctorSpecialityTypes->newEntity();
        if ($this->request->is('post')) {
            $doctorSpecialityType = $this->DoctorSpecialityTypes->patchEntity($doctorSpecialityType, $this->request->data);
            if ($this->DoctorSpecialityTypes->save($doctorSpecialityType)) {
                $this->Flash->success(__('The doctor speciality type has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The doctor speciality type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('doctorSpecialityType'));
        $this->set('_serialize', ['doctorSpecialityType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Doctor Speciality Type id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $doctorSpecialityType = $this->DoctorSpecialityTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $doctorSpecialityType = $this->DoctorSpecialityTypes->patchEntity($doctorSpecialityType, $this->request->data);
            if ($this->DoctorSpecialityTypes->save($doctorSpecialityType)) {
                $this->Flash->success(__('The doctor speciality type has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The doctor speciality type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('doctorSpecialityType'));
        $this->set('_serialize', ['doctorSpecialityType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Doctor Speciality Type id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $doctorSpecialityType = $this->DoctorSpecialityTypes->get($id);
        if ($this->DoctorSpecialityTypes->delete($doctorSpecialityType)) {
            $this->Flash->success(__('The doctor speciality type has been deleted.'));
        } else {
            $this->Flash->error(__('The doctor speciality type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
