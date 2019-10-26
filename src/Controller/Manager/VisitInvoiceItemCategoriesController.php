<?php
namespace App\Controller\Manager;

use App\Controller\AppController;

/**
 * VisitInvoiceItemCategories Controller
 *
 * @property \App\Model\Table\VisitInvoiceItemCategoriesTable $VisitInvoiceItemCategories
 */
class VisitInvoiceItemCategoriesController extends AppController
{
    public function all()
    {
        if($this->request->is('ajax'))
        {
            if($this->request->is('get'))
            {

                $visit_invoice_item_categories = $this->VisitInvoiceItemCategories->find()
                                                                                  ->contain(['VisitInvoiceItems'=> function($q){
                                                                                    return $q->where(['VisitInvoiceItems.institution_id'=>$this->Auth->user('institution_id')]);
                                                                                  }])->order(['VisitInvoiceItemCategories.label_item_category'=>'ASC']);

                if($visit_invoice_item_categories)
                {
                    echo json_encode($visit_invoice_item_categories);
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
                $query_data = $this->request->query;

                $visit_invoice_items = $this->VisitInvoiceItemCategories->find()
                                                                        ->contain(['VisitInvoiceItems'])
                                                                        ->where(['VisitInvoiceItemCategories.id'=>$query_data['category-id']])
                                                                        ->first();


                if($visit_invoice_items)
                {
                    echo json_encode($visit_invoice_items);
                }
                else
                    echo 'ko';

                exit();
            }   

        }
    }

}
