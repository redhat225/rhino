<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DiaryTypes Controller
 *
 * @property \App\Model\Table\DiaryTypesTable $DiaryTypes
 */
class DiaryTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $diaryTypes = $this->paginate($this->DiaryTypes);

        $this->set(compact('diaryTypes'));
        $this->set('_serialize', ['diaryTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Diary Type id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $diaryType = $this->DiaryTypes->get($id, [
            'contain' => ['Diaries']
        ]);

        $this->set('diaryType', $diaryType);
        $this->set('_serialize', ['diaryType']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $diaryType = $this->DiaryTypes->newEntity();
        if ($this->request->is('post')) {
            $diaryType = $this->DiaryTypes->patchEntity($diaryType, $this->request->data);
            if ($this->DiaryTypes->save($diaryType)) {
                $this->Flash->success(__('The diary type has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The diary type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('diaryType'));
        $this->set('_serialize', ['diaryType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Diary Type id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $diaryType = $this->DiaryTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $diaryType = $this->DiaryTypes->patchEntity($diaryType, $this->request->data);
            if ($this->DiaryTypes->save($diaryType)) {
                $this->Flash->success(__('The diary type has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The diary type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('diaryType'));
        $this->set('_serialize', ['diaryType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Diary Type id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $diaryType = $this->DiaryTypes->get($id);
        if ($this->DiaryTypes->delete($diaryType)) {
            $this->Flash->success(__('The diary type has been deleted.'));
        } else {
            $this->Flash->error(__('The diary type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
