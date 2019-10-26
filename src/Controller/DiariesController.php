<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Diaries Controller
 *
 * @property \App\Model\Table\DiariesTable $Diaries
 */
class DiariesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['DiaryTokens', 'DiaryTypes']
        ];
        $diaries = $this->paginate($this->Diaries);

        $this->set(compact('diaries'));
        $this->set('_serialize', ['diaries']);
    }

    /**
     * View method
     *
     * @param string|null $id Diary id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $diary = $this->Diaries->get($id, [
            'contain' => ['DiaryTokens', 'DiaryTypes']
        ]);

        $this->set('diary', $diary);
        $this->set('_serialize', ['diary']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $diary = $this->Diaries->newEntity();
        if ($this->request->is('post')) {
            $diary = $this->Diaries->patchEntity($diary, $this->request->data);
            if ($this->Diaries->save($diary)) {
                $this->Flash->success(__('The diary has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The diary could not be saved. Please, try again.'));
            }
        }
        $diaryTokens = $this->Diaries->DiaryTokens->find('list', ['limit' => 200]);
        $diaryTypes = $this->Diaries->DiaryTypes->find('list', ['limit' => 200]);
        $this->set(compact('diary', 'diaryTokens', 'diaryTypes'));
        $this->set('_serialize', ['diary']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Diary id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $diary = $this->Diaries->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $diary = $this->Diaries->patchEntity($diary, $this->request->data);
            if ($this->Diaries->save($diary)) {
                $this->Flash->success(__('The diary has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The diary could not be saved. Please, try again.'));
            }
        }
        $diaryTokens = $this->Diaries->DiaryTokens->find('list', ['limit' => 200]);
        $diaryTypes = $this->Diaries->DiaryTypes->find('list', ['limit' => 200]);
        $this->set(compact('diary', 'diaryTokens', 'diaryTypes'));
        $this->set('_serialize', ['diary']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Diary id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $diary = $this->Diaries->get($id);
        if ($this->Diaries->delete($diary)) {
            $this->Flash->success(__('The diary has been deleted.'));
        } else {
            $this->Flash->error(__('The diary could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
