<?php
namespace App\Controller\Doctor;

use App\Controller\AppController;
use Cake\Event\Event;
/**
 * Doctors Controller
 *
 * @property \App\Model\Table\DoctorsTable $Doctors
 */
class DoctorsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    /*Login Configuration*/
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->config('loginAction',['controller'=>'Doctors','action'=>'login','prefix'=>'doctor']);
        $this->Auth->config('authenticate',['Form'=>[
                        'fields' => ['username' => 'username', 'password'=>'password'] ,
                        'finder' => 'authdoctor',
                        'userModel'=>'Doctors'
                        ]
            ]);
        $this->Auth->config('logoutRedirect',['controller'=>'Doctors','action'=>'login','prefix'=>'doctor']);
        $this->viewBuilder()->layout('dashboard');
        $this->Auth->allow(['forgotten','login']);        
    }

    public function beforeRender(Event $event)
    {
        $doctor_id = $this->Auth->user('id');
        $this->set(compact('doctor_id'));
    }

    public function login()
    {

        if($this->request->session()->read('Auth.User')!==null)
        {
            return $this->redirect(['action'=>'general']);
        }
        else
        {
            if($this->request->is('ajax'))
            {
                $this->request->allowMethod(['post']);

                $user = $this->Auth->identify();
                if($user)
                {
                    $this->Auth->setUser($user);
                    $this->request->session()->write('Auth.User.prefix','doctor');
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

    public function forgotten()
    {

    }
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    public function general()
    {
        $user = $this->Auth->user();
        $this->set(compact('user'));
    }

    public function view()
    {
        $doctor = $this->Doctors->find()
                                ->where(['id'=>$this->Auth->user('id')])
                                ->first();
        //checking active privileges
        $this->loadModel('DiaryTokens');
        $privileges = $this->DiaryTokens->find('activeDoctorToken',['doctor_id'=>$this->Auth->user('id')]);

        $this->set(compact('doctor','privileges'));

    }

    public function edit()
    {
        $doctor = $this->Doctors->find()
                                ->where(['id'=>$this->Auth->user('id')])
                                ->first();  

        $this->set(compact('doctor'));
    }
    
}
