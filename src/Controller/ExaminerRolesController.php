<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ExaminerRoles Controller
 *
 * @property \App\Model\Table\ExaminerRolesTable $ExaminerRoles
 */
class ExaminerRolesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $examinerRoles = $this->paginate($this->ExaminerRoles);

        $this->set(compact('examinerRoles'));
        $this->set('_serialize', ['examinerRoles']);
    }

    /**
     * View method
     *
     * @param string|null $id Examiner Role id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $examinerRole = $this->ExaminerRoles->get($id, [
            'contain' => ['ExaminerRoleDetails']
        ]);

        $this->set('examinerRole', $examinerRole);
        $this->set('_serialize', ['examinerRole']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $examinerRole = $this->ExaminerRoles->newEntity();
        if ($this->request->is('post')) {
            $examinerRole = $this->ExaminerRoles->patchEntity($examinerRole, $this->request->data);
            if ($this->ExaminerRoles->save($examinerRole)) {
                $this->Flash->success(__('The examiner role has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The examiner role could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('examinerRole'));
        $this->set('_serialize', ['examinerRole']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Examiner Role id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $examinerRole = $this->ExaminerRoles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $examinerRole = $this->ExaminerRoles->patchEntity($examinerRole, $this->request->data);
            if ($this->ExaminerRoles->save($examinerRole)) {
                $this->Flash->success(__('The examiner role has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The examiner role could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('examinerRole'));
        $this->set('_serialize', ['examinerRole']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Examiner Role id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $examinerRole = $this->ExaminerRoles->get($id);
        if ($this->ExaminerRoles->delete($examinerRole)) {
            $this->Flash->success(__('The examiner role has been deleted.'));
        } else {
            $this->Flash->error(__('The examiner role could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
