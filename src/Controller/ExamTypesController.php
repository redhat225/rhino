<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ExamTypes Controller
 *
 * @property \App\Model\Table\ExamTypesTable $ExamTypes
 */
class ExamTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $examTypes = $this->paginate($this->ExamTypes);

        $this->set(compact('examTypes'));
        $this->set('_serialize', ['examTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Exam Type id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $examType = $this->ExamTypes->get($id, [
            'contain' => ['ExamUnderTypes']
        ]);

        $this->set('examType', $examType);
        $this->set('_serialize', ['examType']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $examType = $this->ExamTypes->newEntity();
        if ($this->request->is('post')) {
            $examType = $this->ExamTypes->patchEntity($examType, $this->request->data);
            if ($this->ExamTypes->save($examType)) {
                $this->Flash->success(__('The exam type has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The exam type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('examType'));
        $this->set('_serialize', ['examType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Exam Type id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $examType = $this->ExamTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $examType = $this->ExamTypes->patchEntity($examType, $this->request->data);
            if ($this->ExamTypes->save($examType)) {
                $this->Flash->success(__('The exam type has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The exam type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('examType'));
        $this->set('_serialize', ['examType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Exam Type id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $examType = $this->ExamTypes->get($id);
        if ($this->ExamTypes->delete($examType)) {
            $this->Flash->success(__('The exam type has been deleted.'));
        } else {
            $this->Flash->error(__('The exam type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
