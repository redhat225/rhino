<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DiaryTokens Controller
 *
 * @property \App\Model\Table\DiaryTokensTable $DiaryTokens
 */
class DiaryTokensController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Patients', 'Doctors']
        ];
        $diaryTokens = $this->paginate($this->DiaryTokens);

        $this->set(compact('diaryTokens'));
        $this->set('_serialize', ['diaryTokens']);
    }

    /**
     * View method
     *
     * @param string|null $id Diary Token id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $diaryToken = $this->DiaryTokens->get($id, [
            'contain' => ['Patients', 'Doctors', 'Diaries']
        ]);

        $this->set('diaryToken', $diaryToken);
        $this->set('_serialize', ['diaryToken']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $diaryToken = $this->DiaryTokens->newEntity();
        if ($this->request->is('post')) {
            $diaryToken = $this->DiaryTokens->patchEntity($diaryToken, $this->request->data);
            if ($this->DiaryTokens->save($diaryToken)) {
                $this->Flash->success(__('The diary token has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The diary token could not be saved. Please, try again.'));
            }
        }
        $patients = $this->DiaryTokens->Patients->find('list', ['limit' => 200]);
        $doctors = $this->DiaryTokens->Doctors->find('list', ['limit' => 200]);
        $this->set(compact('diaryToken', 'patients', 'doctors'));
        $this->set('_serialize', ['diaryToken']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Diary Token id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $diaryToken = $this->DiaryTokens->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $diaryToken = $this->DiaryTokens->patchEntity($diaryToken, $this->request->data);
            if ($this->DiaryTokens->save($diaryToken)) {
                $this->Flash->success(__('The diary token has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The diary token could not be saved. Please, try again.'));
            }
        }
        $patients = $this->DiaryTokens->Patients->find('list', ['limit' => 200]);
        $doctors = $this->DiaryTokens->Doctors->find('list', ['limit' => 200]);
        $this->set(compact('diaryToken', 'patients', 'doctors'));
        $this->set('_serialize', ['diaryToken']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Diary Token id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $diaryToken = $this->DiaryTokens->get($id);
        if ($this->DiaryTokens->delete($diaryToken)) {
            $this->Flash->success(__('The diary token has been deleted.'));
        } else {
            $this->Flash->error(__('The diary token could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
