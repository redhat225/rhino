<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * VisitSpecialities Controller
 *
 * @property \App\Model\Table\VisitSpecialitiesTable $VisitSpecialities
 */
class VisitSpecialitiesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $visitSpecialities = $this->paginate($this->VisitSpecialities);

        $this->set(compact('visitSpecialities'));
        $this->set('_serialize', ['visitSpecialities']);
    }

    /**
     * View method
     *
     * @param string|null $id Visit Speciality id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $visitSpeciality = $this->VisitSpecialities->get($id, [
            'contain' => ['Visits']
        ]);

        $this->set('visitSpeciality', $visitSpeciality);
        $this->set('_serialize', ['visitSpeciality']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $visitSpeciality = $this->VisitSpecialities->newEntity();
        if ($this->request->is('post')) {
            $visitSpeciality = $this->VisitSpecialities->patchEntity($visitSpeciality, $this->request->data);
            if ($this->VisitSpecialities->save($visitSpeciality)) {
                $this->Flash->success(__('The visit speciality has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The visit speciality could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('visitSpeciality'));
        $this->set('_serialize', ['visitSpeciality']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Visit Speciality id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $visitSpeciality = $this->VisitSpecialities->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $visitSpeciality = $this->VisitSpecialities->patchEntity($visitSpeciality, $this->request->data);
            if ($this->VisitSpecialities->save($visitSpeciality)) {
                $this->Flash->success(__('The visit speciality has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The visit speciality could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('visitSpeciality'));
        $this->set('_serialize', ['visitSpeciality']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Visit Speciality id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $visitSpeciality = $this->VisitSpecialities->get($id);
        if ($this->VisitSpecialities->delete($visitSpeciality)) {
            $this->Flash->success(__('The visit speciality has been deleted.'));
        } else {
            $this->Flash->error(__('The visit speciality could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
