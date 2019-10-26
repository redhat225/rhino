<?php
namespace App\Controller\Manager;

use App\Controller\AppController;

/**
 * VisitInvoiceItems Controller
 *
 * @property \App\Model\Table\VisitInvoiceItemsTable $VisitInvoiceItems
 */
class VisitInvoiceItemsController extends AppController
{

    public function addInline()
    {
        if($this->request->is('ajax'))
        {
            if($this->request->is('get'))
            {
                $items = $this->VisitInvoiceItems->find()
                              ->where(['VisitInvoiceItems.visit_invoice_item_category_id'=>1]);

                $this->set(compact('items'));
            }
        }
    }



}
