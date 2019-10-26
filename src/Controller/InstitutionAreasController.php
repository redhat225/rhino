<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * InstitutionAreas Controller
 *
 * @property \App\Model\Table\InstitutionAreasTable $InstitutionAreas
 */
class InstitutionAreasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $institutionAreas = $this->paginate($this->InstitutionAreas);

        $this->set(compact('institutionAreas'));
        $this->set('_serialize', ['institutionAreas']);
    }

    /**
     * View method
     *
     * @param string|null $id Institution Area id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $institutionArea = $this->InstitutionAreas->get($id, [
            'contain' => []
        ]);

        $this->set('institutionArea', $institutionArea);
        $this->set('_serialize', ['institutionArea']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $institutionArea = $this->InstitutionAreas->newEntity();
        if ($this->request->is('post')) {
            $institutionArea = $this->InstitutionAreas->patchEntity($institutionArea, $this->request->data);
            if ($this->InstitutionAreas->save($institutionArea)) {
                $this->Flash->success(__('The institution area has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The institution area could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('institutionArea'));
        $this->set('_serialize', ['institutionArea']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Institution Area id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $institutionArea = $this->InstitutionAreas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $institutionArea = $this->InstitutionAreas->patchEntity($institutionArea, $this->request->data);
            if ($this->InstitutionAreas->save($institutionArea)) {
                $this->Flash->success(__('The institution area has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The institution area could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('institutionArea'));
        $this->set('_serialize', ['institutionArea']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Institution Area id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $institutionArea = $this->InstitutionAreas->get($id);
        if ($this->InstitutionAreas->delete($institutionArea)) {
            $this->Flash->success(__('The institution area has been deleted.'));
        } else {
            $this->Flash->error(__('The institution area could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
