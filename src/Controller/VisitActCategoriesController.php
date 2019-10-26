<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * VisitActCategories Controller
 *
 * @property \App\Model\Table\VisitActCategoriesTable $VisitActCategories
 */
class VisitActCategoriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $visitActCategories = $this->paginate($this->VisitActCategories);

        $this->set(compact('visitActCategories'));
        $this->set('_serialize', ['visitActCategories']);
    }

    /**
     * View method
     *
     * @param string|null $id Visit Act Category id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $visitActCategory = $this->VisitActCategories->get($id, [
            'contain' => ['VisitActSubCategories']
        ]);

        $this->set('visitActCategory', $visitActCategory);
        $this->set('_serialize', ['visitActCategory']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $visitActCategory = $this->VisitActCategories->newEntity();
        if ($this->request->is('post')) {
            $visitActCategory = $this->VisitActCategories->patchEntity($visitActCategory, $this->request->data);
            if ($this->VisitActCategories->save($visitActCategory)) {
                $this->Flash->success(__('The visit act category has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The visit act category could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('visitActCategory'));
        $this->set('_serialize', ['visitActCategory']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Visit Act Category id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $visitActCategory = $this->VisitActCategories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $visitActCategory = $this->VisitActCategories->patchEntity($visitActCategory, $this->request->data);
            if ($this->VisitActCategories->save($visitActCategory)) {
                $this->Flash->success(__('The visit act category has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The visit act category could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('visitActCategory'));
        $this->set('_serialize', ['visitActCategory']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Visit Act Category id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $visitActCategory = $this->VisitActCategories->get($id);
        if ($this->VisitActCategories->delete($visitActCategory)) {
            $this->Flash->success(__('The visit act category has been deleted.'));
        } else {
            $this->Flash->error(__('The visit act category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
