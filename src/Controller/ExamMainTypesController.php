<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ExamMainTypes Controller
 *
 * @property \App\Model\Table\ExamMainTypesTable $ExamMainTypes
 */
class ExamMainTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $examMainTypes = $this->paginate($this->ExamMainTypes);

        $this->set(compact('examMainTypes'));
        $this->set('_serialize', ['examMainTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Exam Main Type id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $examMainType = $this->ExamMainTypes->get($id, [
            'contain' => ['ExamTypes']
        ]);

        $this->set('examMainType', $examMainType);
        $this->set('_serialize', ['examMainType']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $examMainType = $this->ExamMainTypes->newEntity();
        if ($this->request->is('post')) {
            $examMainType = $this->ExamMainTypes->patchEntity($examMainType, $this->request->data);
            if ($this->ExamMainTypes->save($examMainType)) {
                $this->Flash->success(__('The exam main type has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The exam main type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('examMainType'));
        $this->set('_serialize', ['examMainType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Exam Main Type id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $examMainType = $this->ExamMainTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $examMainType = $this->ExamMainTypes->patchEntity($examMainType, $this->request->data);
            if ($this->ExamMainTypes->save($examMainType)) {
                $this->Flash->success(__('The exam main type has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The exam main type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('examMainType'));
        $this->set('_serialize', ['examMainType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Exam Main Type id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $examMainType = $this->ExamMainTypes->get($id);
        if ($this->ExamMainTypes->delete($examMainType)) {
            $this->Flash->success(__('The exam main type has been deleted.'));
        } else {
            $this->Flash->error(__('The exam main type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
