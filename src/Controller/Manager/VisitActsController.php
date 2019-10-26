<?php
namespace App\Controller\Manager;

use App\Controller\AppController;

/**
 * VisitActs Controller
 *
 * @property \App\Model\Table\VisitActsTable $VisitActs
 */
class VisitActsController extends AppController
{

    public function all()
    {
        if($this->request->is('ajax'))
        {
            if($this->request->is('get'))
            {
                $this->loadModel('VisitActCategories');
                $visit_act_categories = $this->VisitActCategories->find()
                                              ->contain(['VisitActSubCategories'=>function($q){
                                                return $q->order(['VisitActSubCategories.main_label_category'=>'ASC']);
                                              },'VisitActSubCategories.VisitActs'])->order(['VisitActCategories.description_category'=>'ASC']);
                if($visit_act_categories)
                {
                    echo json_encode($visit_act_categories);
                }
                else
                {
                    echo 'ko';
                }

                exit();
            }
        }
    }

    public function get()
    {
        if($this->request->is('ajax'))
        {
            if($this->request->is('get'))
            {
                $acts = $this->VisitActs->find()
                                        ->contain(['VisitActSubCategories.VisitActCategories'])
                                        ->where(['visit_act_sub_category_id'=>$this->request->query['category-id']]);
                if($acts)
                {
                    echo json_encode($acts);
                }
                else
                {
                    echo 'ko';
                }

                exit();

            }
        }
    }


}
