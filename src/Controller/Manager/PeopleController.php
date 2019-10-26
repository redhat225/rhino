<?php
namespace App\Controller\Manager;

use App\Controller\AppController;
use GuzzleHttp\Client;
use Cake\Cache\Cache;
use GuzzleHttp\Exception\ConnectException;
/**
 * People Controller
 *
 * @property \App\Model\Table\PeopleTable $People
 */
class PeopleController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $people = $this->paginate($this->People);

        $this->set(compact('people'));
        $this->set('_serialize', ['people']);
    }

    public function globalSearch()
    {
        if($this->request->is('ajax'))
        {
            if($this->request->is('get'))
            {
                $query_data = $this->request->query;

                switch($query_data['kind'])
                {
                    case 'search-people':
                            $result = json_encode($this->searchPeople($query_data));
                    break;

                    case 'search-bill':
                            $result = json_encode($this->searchBill($query_data));
                    break;

                    case 'search-drug':
                            $result = $this->searchDrug($query_data);
                    break;
                }


                if($result)
                {
                    echo $result;
                }
                else
                {
                    echo 'ko';
                }

                exit();
            }
        }   
    }

    private function searchPeople($query_data)
    {
                $query_data['institution_id']= $this->Auth->user('institution_id');

                $patients = $this->People->find('globalpatient',['tags'=>$query_data['tags'],'institution_id'=>$query_data['institution_id']]);
                $doctors = $this->People->find('globaldoctor',['tags'=>$query_data['tags'],'institution_id'=>$query_data['institution_id']]);
                $manager_operators = $this->People->find('globalmanager',['tags'=>$query_data['tags'],'institution_id'=>$query_data['institution_id']]);

                $pharmacy_operators = $this->People->find('globalpharmacy',['tags'=>$query_data['tags'],'institution_id'=>$query_data['institution_id']]);

                $auxiliaries = $this->People->find('globalauxiliary',['tags'=>$query_data['tags'],'institution_id'=>$query_data['institution_id']]);

                $result = array_merge($patients->toArray(),$doctors->toArray(),$manager_operators->toArray(),$pharmacy_operators->toArray(),$auxiliaries->toArray());

                return $result;
    }

    private function searchBill($query_data)
    {
        $this->loadModel('VisitInvoices');

        $bills = $this->VisitInvoices->find()->contain(['ManagerOperators','Visits.Patients.People'=>function($q){
            return $q->select(['People.lastname','People.firstname']);
        }])
                              ->where(["CONCAT(VisitInvoices.code_invoice,' ',DATE_FORMAT(VisitInvoices.created,'%d-%m-%Y')) like "=>'%'.$query_data['tags'].'%'])
                              ->orWhere(["CONCAT(DATE_FORMAT(VisitInvoices.sold_date,'%d-%m-%Y')) like "=>'%'.$query_data['tags'].'%'])
                              ->andWhere(['ManagerOperators.institution_id'=>$this->Auth->user('institution_id')])
                              ->map(function($row){
                                    //formatting dates
                                    $created_date = new \DateTime($row->created);
                                    $row->formatted_created = $created_date->format('d-m-Y');
                                    if($row->sold_date)
                                    {
                                        $sold_date  = new \DateTime($row->sold_date);
                                        $row->formatted_sold = $sold_date->format('d-m-Y');
                                    }
                                    
                                return $row;
                              })->toArray();

        return $bills;
    }


    private function searchDrug($query_data)
     {
        //search in the cache
        if(Cache::read($query_data['tags'],'medicament')===false)
        {
                    // then in open medicament api
                    $client = new Client();
                    try 
                    {
                           $result = $client->request('GET','https://open-medicaments.fr/api/v1/medicaments',['query'=>['query'=>$query_data['tags']],'timeout'=>60]);

                            if($result->getStatusCode()=='200')
                            {
                                $headers = $result->getBody();
                                $response= $headers->getContents();
                                if($response==="[]")
                                    $response = 'ko';
                                else
                                    Cache::write($query_data['tags'],$response,'medicament');
                            }
                            else
                            {
                                $response = 'down';
                            }

                    } catch (ConnectException $e) 
                    {
                        $response = 'down';
                    }

                 


        }
        else
        {
            $response = Cache::read($query_data['tags'],'medicament');
        }

        return $response;
     }


    /**
     * View method
     *
     * @param string|null $id Person id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $person = $this->People->get($id, [
            'contain' => []
        ]);

        $this->set('person', $person);
        $this->set('_serialize', ['person']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $person = $this->People->newEntity();
        if ($this->request->is('post')) {
            $person = $this->People->patchEntity($person, $this->request->data);
            if ($this->People->save($person)) {
                $this->Flash->success(__('The person has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The person could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('person'));
        $this->set('_serialize', ['person']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Person id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $person = $this->People->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $person = $this->People->patchEntity($person, $this->request->data);
            if ($this->People->save($person)) {
                $this->Flash->success(__('The person has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The person could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('person'));
        $this->set('_serialize', ['person']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Person id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $person = $this->People->get($id);
        if ($this->People->delete($person)) {
            $this->Flash->success(__('The person has been deleted.'));
        } else {
            $this->Flash->error(__('The person could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
