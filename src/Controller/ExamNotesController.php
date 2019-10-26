<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ExamNotes Controller
 *
 * @property \App\Model\Table\ExamNotesTable $ExamNotes
 */
class ExamNotesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Exams']
        ];
        $examNotes = $this->paginate($this->ExamNotes);

        $this->set(compact('examNotes'));
        $this->set('_serialize', ['examNotes']);
    }

    /**
     * View method
     *
     * @param string|null $id Exam Note id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $examNote = $this->ExamNotes->get($id, [
            'contain' => ['Exams']
        ]);

        $this->set('examNote', $examNote);
        $this->set('_serialize', ['examNote']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $examNote = $this->ExamNotes->newEntity();
        if ($this->request->is('post')) {
            $examNote = $this->ExamNotes->patchEntity($examNote, $this->request->data);
            if ($this->ExamNotes->save($examNote)) {
                $this->Flash->success(__('The exam note has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The exam note could not be saved. Please, try again.'));
            }
        }
        $exams = $this->ExamNotes->Exams->find('list', ['limit' => 200]);
        $this->set(compact('examNote', 'exams'));
        $this->set('_serialize', ['examNote']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Exam Note id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $examNote = $this->ExamNotes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $examNote = $this->ExamNotes->patchEntity($examNote, $this->request->data);
            if ($this->ExamNotes->save($examNote)) {
                $this->Flash->success(__('The exam note has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The exam note could not be saved. Please, try again.'));
            }
        }
        $exams = $this->ExamNotes->Exams->find('list', ['limit' => 200]);
        $this->set(compact('examNote', 'exams'));
        $this->set('_serialize', ['examNote']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Exam Note id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $examNote = $this->ExamNotes->get($id);
        if ($this->ExamNotes->delete($examNote)) {
            $this->Flash->success(__('The exam note has been deleted.'));
        } else {
            $this->Flash->error(__('The exam note could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
