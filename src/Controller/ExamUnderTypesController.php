<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ExamUnderTypes Controller
 *
 * @property \App\Model\Table\ExamUnderTypesTable $ExamUnderTypes
 */
class ExamUnderTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ExamTypes']
        ];
        $examUnderTypes = $this->paginate($this->ExamUnderTypes);

        $this->set(compact('examUnderTypes'));
        $this->set('_serialize', ['examUnderTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Exam Under Type id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $examUnderType = $this->ExamUnderTypes->get($id, [
            'contain' => ['ExamTypes']
        ]);

        $this->set('examUnderType', $examUnderType);
        $this->set('_serialize', ['examUnderType']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $examUnderType = $this->ExamUnderTypes->newEntity();
        if ($this->request->is('post')) {
            $examUnderType = $this->ExamUnderTypes->patchEntity($examUnderType, $this->request->data);
            if ($this->ExamUnderTypes->save($examUnderType)) {
                $this->Flash->success(__('The exam under type has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The exam under type could not be saved. Please, try again.'));
            }
        }
        $examTypes = $this->ExamUnderTypes->ExamTypes->find('list', ['limit' => 200]);
        $this->set(compact('examUnderType', 'examTypes'));
        $this->set('_serialize', ['examUnderType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Exam Under Type id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $examUnderType = $this->ExamUnderTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $examUnderType = $this->ExamUnderTypes->patchEntity($examUnderType, $this->request->data);
            if ($this->ExamUnderTypes->save($examUnderType)) {
                $this->Flash->success(__('The exam under type has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The exam under type could not be saved. Please, try again.'));
            }
        }
        $examTypes = $this->ExamUnderTypes->ExamTypes->find('list', ['limit' => 200]);
        $this->set(compact('examUnderType', 'examTypes'));
        $this->set('_serialize', ['examUnderType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Exam Under Type id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $examUnderType = $this->ExamUnderTypes->get($id);
        if ($this->ExamUnderTypes->delete($examUnderType)) {
            $this->Flash->success(__('The exam under type has been deleted.'));
        } else {
            $this->Flash->error(__('The exam under type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
