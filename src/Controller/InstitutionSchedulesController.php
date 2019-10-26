<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * InstitutionSchedules Controller
 *
 * @property \App\Model\Table\InstitutionSchedulesTable $InstitutionSchedules
 */
class InstitutionSchedulesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $institutionSchedules = $this->paginate($this->InstitutionSchedules);

        $this->set(compact('institutionSchedules'));
        $this->set('_serialize', ['institutionSchedules']);
    }

    /**
     * View method
     *
     * @param string|null $id Institution Schedule id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $institutionSchedule = $this->InstitutionSchedules->get($id, [
            'contain' => []
        ]);

        $this->set('institutionSchedule', $institutionSchedule);
        $this->set('_serialize', ['institutionSchedule']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $institutionSchedule = $this->InstitutionSchedules->newEntity();
        if ($this->request->is('post')) {
            $institutionSchedule = $this->InstitutionSchedules->patchEntity($institutionSchedule, $this->request->data);
            if ($this->InstitutionSchedules->save($institutionSchedule)) {
                $this->Flash->success(__('The institution schedule has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The institution schedule could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('institutionSchedule'));
        $this->set('_serialize', ['institutionSchedule']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Institution Schedule id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $institutionSchedule = $this->InstitutionSchedules->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $institutionSchedule = $this->InstitutionSchedules->patchEntity($institutionSchedule, $this->request->data);
            if ($this->InstitutionSchedules->save($institutionSchedule)) {
                $this->Flash->success(__('The institution schedule has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The institution schedule could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('institutionSchedule'));
        $this->set('_serialize', ['institutionSchedule']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Institution Schedule id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $institutionSchedule = $this->InstitutionSchedules->get($id);
        if ($this->InstitutionSchedules->delete($institutionSchedule)) {
            $this->Flash->success(__('The institution schedule has been deleted.'));
        } else {
            $this->Flash->error(__('The institution schedule could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
