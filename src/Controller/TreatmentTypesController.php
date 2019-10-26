<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TreatmentTypes Controller
 *
 * @property \App\Model\Table\TreatmentTypesTable $TreatmentTypes
 */
class TreatmentTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $treatmentTypes = $this->paginate($this->TreatmentTypes);

        $this->set(compact('treatmentTypes'));
        $this->set('_serialize', ['treatmentTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Treatment Type id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $treatmentType = $this->TreatmentTypes->get($id, [
            'contain' => ['Treatments']
        ]);

        $this->set('treatmentType', $treatmentType);
        $this->set('_serialize', ['treatmentType']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $treatmentType = $this->TreatmentTypes->newEntity();
        if ($this->request->is('post')) {
            $treatmentType = $this->TreatmentTypes->patchEntity($treatmentType, $this->request->data);
            if ($this->TreatmentTypes->save($treatmentType)) {
                $this->Flash->success(__('The treatment type has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The treatment type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('treatmentType'));
        $this->set('_serialize', ['treatmentType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Treatment Type id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $treatmentType = $this->TreatmentTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $treatmentType = $this->TreatmentTypes->patchEntity($treatmentType, $this->request->data);
            if ($this->TreatmentTypes->save($treatmentType)) {
                $this->Flash->success(__('The treatment type has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The treatment type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('treatmentType'));
        $this->set('_serialize', ['treatmentType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Treatment Type id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $treatmentType = $this->TreatmentTypes->get($id);
        if ($this->TreatmentTypes->delete($treatmentType)) {
            $this->Flash->success(__('The treatment type has been deleted.'));
        } else {
            $this->Flash->error(__('The treatment type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
