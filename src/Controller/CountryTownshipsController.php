<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CountryTownships Controller
 *
 * @property \App\Model\Table\CountryTownshipsTable $CountryTownships
 */
class CountryTownshipsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['CountryCities']
        ];
        $countryTownships = $this->paginate($this->CountryTownships);

        $this->set(compact('countryTownships'));
        $this->set('_serialize', ['countryTownships']);
    }

    /**
     * View method
     *
     * @param string|null $id Country Township id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $countryTownship = $this->CountryTownships->get($id, [
            'contain' => ['CountryCities', 'Institutions', 'PeopleAdresses', 'RequirementHolders']
        ]);

        $this->set('countryTownship', $countryTownship);
        $this->set('_serialize', ['countryTownship']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $countryTownship = $this->CountryTownships->newEntity();
        if ($this->request->is('post')) {
            $countryTownship = $this->CountryTownships->patchEntity($countryTownship, $this->request->data);
            if ($this->CountryTownships->save($countryTownship)) {
                $this->Flash->success(__('The country township has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The country township could not be saved. Please, try again.'));
            }
        }
        $countryCities = $this->CountryTownships->CountryCities->find('list', ['limit' => 200]);
        $this->set(compact('countryTownship', 'countryCities'));
        $this->set('_serialize', ['countryTownship']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Country Township id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $countryTownship = $this->CountryTownships->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $countryTownship = $this->CountryTownships->patchEntity($countryTownship, $this->request->data);
            if ($this->CountryTownships->save($countryTownship)) {
                $this->Flash->success(__('The country township has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The country township could not be saved. Please, try again.'));
            }
        }
        $countryCities = $this->CountryTownships->CountryCities->find('list', ['limit' => 200]);
        $this->set(compact('countryTownship', 'countryCities'));
        $this->set('_serialize', ['countryTownship']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Country Township id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $countryTownship = $this->CountryTownships->get($id);
        if ($this->CountryTownships->delete($countryTownship)) {
            $this->Flash->success(__('The country township has been deleted.'));
        } else {
            $this->Flash->error(__('The country township could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
