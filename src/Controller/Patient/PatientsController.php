<?php
namespace App\Controller\Patient;

use App\Controller\AppController;
use cake\Event\Event;
use Cake\Utility\Security;

/**
 * Patients Controller
 *
 * @property \App\Model\Table\PatientsTable $Patients
 */
class PatientsController extends AppController
{

    /*Login Configuration*/
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->config('loginAction',['controller'=>'Patients','action'=>'login','prefix'=>'patient']);
        $this->Auth->config('authenticate',['Form'=>[
                        'fields' => ['username' => 'username', 'password'=>'password'] ,
                        'finder' => 'authpatient',
                        'userModel'=>'Patients'
                        ]
            ]);
        $this->Auth->config('logoutRedirect',['controller'=>'Patients','action'=>'login','prefix'=>'patient']);
        $this->viewBuilder()->layout('dashboard');
        $this->Auth->allow(['forgotten','login']);        
    }

    public function login()
    {

        if($this->request->session()->read('Auth.User')!==null)
        {
            return $this->redirect(['action'=>'general']);
        }
        else{
            if($this->request->is('ajax'))
            {
                $this->request->allowMethod(['post']);

                $user = $this->Auth->identify();
                if($user)
                {
                    $token = Security::hash($user['username'].$user['id'],'sha1',true);
                    $this->Auth->setUser($user);
                    $this->request->session()->write('Auth.User.token',$token);
                    $this->request->session()->write('Auth.User.prefix','patient');
                    echo "ok";
                }
                else
                {
                    echo "ko";
                }
                exit();
            }
            $this->viewBuilder()->layout('login');            
        }

    }

    public function edit()
    {
        $patient = $this->Patients->get($this->Auth->user('id'));

        if($this->request->is('post'))
        {
            $data = $this->request->data;
            $patient = $this->Patients->patchEntity($patient,$data);
            if($this->Patients->save($patient))
            {
                $this->Flash->success(__('Modifications effectuées avec succès'));
                return $this->redirect(['controller'=>'Patients','action'=>'view']);
            }
            else
            {
                $this->Flash->error(__("Enregistrement échoué, veuillez corriger le formaulaire"));
                return $this->redirect($this->referer());
            }

        }
        // debug($patient);
        $this->set(compact('patient'));
    }

    public function view()
    {
        $patient = $this->Patients->get($this->Auth->user('id'));
        $this->set(compact('patient'));
    }

    public function logAccess()
    {
        $logs = $this->Patients->DiaryTokens->find()
                                        ->contain(['Diaries.DiaryTypes','Doctors.People.PeopleContacts'])
                                        ->where(['DiaryTokens.patient_id'=>$this->Auth->user('id')])
                                        ->order(['DiaryTokens.created'=>'DESC']);
        $this->set(compact('logs'));
    }

    public function forgotten()
    {

    }

    public function privileges()
    {
        $this->loadModel('DiaryTokens');
        $this->loadModel('Doctors');
        $privileges = $this->DiaryTokens->find()
                                    ->contain(['Doctors.People'])
                                    ->where(['DiaryTokens.patient_id'=>$this->Auth->user('id')]);
        $this->paginate = [
            'Doctors'=>[
                'contain' => ['People.PeopleContacts','DoctorSpecialities'],
                'sortWhitelist' => ['People.firstname','People.lastname'],
                'order' => ['People.lastname'=>'ASC']
            ]
        ];
        $doctors = $this->paginate($this->Doctors);
        $this->set(compact('privileges','doctors'));
    }

    public function general()
    {
        $user = $this->Auth->user();
        $this->set(compact('user'));
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

}
