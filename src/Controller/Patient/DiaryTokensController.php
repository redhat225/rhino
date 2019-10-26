<?php
namespace App\Controller\Patient;

use App\Controller\AppController;

/**
 * DiaryTokens Controller
 *
 * @property \App\Model\Table\DiaryTokensTable $DiaryTokens
 */
class DiaryTokensController extends AppController
{

    public function add()
    {
       if($this->request->is('ajax'))
       {
         if($this->request->is('post'))
         {
            $data = $this->request->data;
            //checking if an active token is in use
            $search_diary = $this->DiaryTokens->find('activeToken',['doctor_id'=>$data['doctor_id_setting_privilege'],'patient_id'=>$this->Auth->user('id')]);

            $already = false;
            if(!$search_diary->isEmpty())
            {
                foreach($search_diary as $diary)
                {
                    if($diary->result=="-")
                        $already = true;
                } 
            }

            if($already)
            {
                echo "already";
            }
            else
            {
                $diary_token = $this->DiaryTokens->newEntity($data,['associated'=>['Diaries']]);
                $diary_token->patient_id = $this->Auth->user('id');

                if($this->DiaryTokens->save($diary_token))
                {
                    echo "ok";
                }
                else
                {
                    echo "ko";
                }

            }


         }
         exit();
       }
    }

    public function remove()
    {
       if($this->request->is('ajax'))
       {
         if($this->request->is('post'))
         {
            $data = $this->request->data;
            $diary_token = $this->DiaryTokens->get($data['diary_id']);
            $diary_token->abort = 1;
            if($this->DiaryTokens->save($diary_token))
            {
                echo "ok";
            }
            else
            {
                echo "ko";
            }
         }
               
        exit();
       }

    }


    public function edit()
    {
       if($this->request->is('ajax'))
       {
         if($this->request->is('post'))
         {
            $data = $this->request->data;
            $diary_token = $this->DiaryTokens->get($data['diary_id_increase']);
            if(($data['validity_increase']<0) && (abs($data['validity_increase']>$diary_token->delay)))
                echo "shutdown";
            else
            {
                $diary_token->delay +=$data['validity_increase'];
                if($this->DiaryTokens->save($diary_token))
                    echo "ok";
                else
                    echo "ko";
            }

         }
         exit();
       }
    }

}
