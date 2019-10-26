<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CountryCities Controller
 *
 * @property \App\Model\Table\CountryCitiesTable $CountryCities
 */
class CountryCitiesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Countries']
        ];
        $countryCities = $this->paginate($this->CountryCities);

        $this->set(compact('countryCities'));
        $this->set('_serialize', ['countryCities']);
    }

    /**
     * View method
     *
     * @param string|null $id Country City id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $countryCity = $this->CountryCities->get($id, [
            'contain' => ['Countries', 'CountryTownships']
        ]);

        $this->set('countryCity', $countryCity);
        $this->set('_serialize', ['countryCity']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $countryCity = $this->CountryCities->newEntity();
        if ($this->request->is('post')) {
            $countryCity = $this->CountryCities->patchEntity($countryCity, $this->request->data);
            if ($this->CountryCities->save($countryCity)) {
                $this->Flash->success(__('The country city has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The country city could not be saved. Please, try again.'));
            }
        }
        $countries = $this->CountryCities->Countries->find('list', ['limit' => 200]);
        $this->set(compact('countryCity', 'countries'));
        $this->set('_serialize', ['countryCity']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Country City id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $countryCity = $this->CountryCities->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $countryCity = $this->CountryCities->patchEntity($countryCity, $this->request->data);
            if ($this->CountryCities->save($countryCity)) {
                $this->Flash->success(__('The country city has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The country city could not be saved. Please, try again.'));
            }
        }
        $countries = $this->CountryCities->Countries->find('list', ['limit' => 200]);
        $this->set(compact('countryCity', 'countries'));
        $this->set('_serialize', ['countryCity']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Country City id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $countryCity = $this->CountryCities->get($id);
        if ($this->CountryCities->delete($countryCity)) {
            $this->Flash->success(__('The country city has been deleted.'));
        } else {
            $this->Flash->error(__('The country city could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
