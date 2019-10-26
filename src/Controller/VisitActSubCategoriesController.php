<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * VisitActSubCategories Controller
 *
 * @property \App\Model\Table\VisitActSubCategoriesTable $VisitActSubCategories
 */
class VisitActSubCategoriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['VisitActCategories']
        ];
        $visitActSubCategories = $this->paginate($this->VisitActSubCategories);

        $this->set(compact('visitActSubCategories'));
        $this->set('_serialize', ['visitActSubCategories']);
    }

    /**
     * View method
     *
     * @param string|null $id Visit Act Sub Category id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $visitActSubCategory = $this->VisitActSubCategories->get($id, [
            'contain' => ['VisitActCategories', 'VisitActs']
        ]);

        $this->set('visitActSubCategory', $visitActSubCategory);
        $this->set('_serialize', ['visitActSubCategory']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $visitActSubCategory = $this->VisitActSubCategories->newEntity();
        if ($this->request->is('post')) {
            $visitActSubCategory = $this->VisitActSubCategories->patchEntity($visitActSubCategory, $this->request->data);
            if ($this->VisitActSubCategories->save($visitActSubCategory)) {
                $this->Flash->success(__('The visit act sub category has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The visit act sub category could not be saved. Please, try again.'));
            }
        }
        $visitActCategories = $this->VisitActSubCategories->VisitActCategories->find('list', ['limit' => 200]);
        $this->set(compact('visitActSubCategory', 'visitActCategories'));
        $this->set('_serialize', ['visitActSubCategory']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Visit Act Sub Category id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $visitActSubCategory = $this->VisitActSubCategories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $visitActSubCategory = $this->VisitActSubCategories->patchEntity($visitActSubCategory, $this->request->data);
            if ($this->VisitActSubCategories->save($visitActSubCategory)) {
                $this->Flash->success(__('The visit act sub category has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The visit act sub category could not be saved. Please, try again.'));
            }
        }
        $visitActCategories = $this->VisitActSubCategories->VisitActCategories->find('list', ['limit' => 200]);
        $this->set(compact('visitActSubCategory', 'visitActCategories'));
        $this->set('_serialize', ['visitActSubCategory']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Visit Act Sub Category id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $visitActSubCategory = $this->VisitActSubCategories->get($id);
        if ($this->VisitActSubCategories->delete($visitActSubCategory)) {
            $this->Flash->success(__('The visit act sub category has been deleted.'));
        } else {
            $this->Flash->error(__('The visit act sub category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
