<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PharmacyInstitutions Controller
 *
 * @property \App\Model\Table\PharmacyInstitutionsTable $PharmacyInstitutions
 */
class PharmacyInstitutionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Institutions']
        ];
        $pharmacyInstitutions = $this->paginate($this->PharmacyInstitutions);

        $this->set(compact('pharmacyInstitutions'));
        $this->set('_serialize', ['pharmacyInstitutions']);
    }

    /**
     * View method
     *
     * @param string|null $id Pharmacy Institution id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pharmacyInstitution = $this->PharmacyInstitutions->get($id, [
            'contain' => ['Institutions', 'PharmacyOperators', 'PharmacyProducts']
        ]);

        $this->set('pharmacyInstitution', $pharmacyInstitution);
        $this->set('_serialize', ['pharmacyInstitution']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pharmacyInstitution = $this->PharmacyInstitutions->newEntity();
        if ($this->request->is('post')) {
            $pharmacyInstitution = $this->PharmacyInstitutions->patchEntity($pharmacyInstitution, $this->request->data);
            if ($this->PharmacyInstitutions->save($pharmacyInstitution)) {
                $this->Flash->success(__('The pharmacy institution has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pharmacy institution could not be saved. Please, try again.'));
            }
        }
        $institutions = $this->PharmacyInstitutions->Institutions->find('list', ['limit' => 200]);
        $this->set(compact('pharmacyInstitution', 'institutions'));
        $this->set('_serialize', ['pharmacyInstitution']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pharmacy Institution id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pharmacyInstitution = $this->PharmacyInstitutions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pharmacyInstitution = $this->PharmacyInstitutions->patchEntity($pharmacyInstitution, $this->request->data);
            if ($this->PharmacyInstitutions->save($pharmacyInstitution)) {
                $this->Flash->success(__('The pharmacy institution has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pharmacy institution could not be saved. Please, try again.'));
            }
        }
        $institutions = $this->PharmacyInstitutions->Institutions->find('list', ['limit' => 200]);
        $this->set(compact('pharmacyInstitution', 'institutions'));
        $this->set('_serialize', ['pharmacyInstitution']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pharmacy Institution id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pharmacyInstitution = $this->PharmacyInstitutions->get($id);
        if ($this->PharmacyInstitutions->delete($pharmacyInstitution)) {
            $this->Flash->success(__('The pharmacy institution has been deleted.'));
        } else {
            $this->Flash->error(__('The pharmacy institution could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
