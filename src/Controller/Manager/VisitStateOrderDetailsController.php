<?php
namespace App\Controller\Manager;

use App\Controller\AppController;

/**
 * VisitStateOrderDetails Controller
 *
 * @property \App\Model\Table\VisitStateOrderDetailsTable $VisitStateOrderDetails
 */
class VisitStateOrderDetailsController extends AppController
{
    public function getOrderPdf($id)
    {

        $state = $this->VisitStateOrderDetails->find()
                                              ->where(['id'=>$id])
                                              ->first();


        $this->response->file('Files'.DS.'manager'.DS.$this->Auth->user('institution.slug').DS.'orders'.DS. $state->path_order_details.'.pdf',['download'=>false]);
        return $this->response; 
    }

        public function downloadOrderPdf($id)
    {

        $state = $this->VisitStateOrderDetails->find()
                                              ->where(['id'=>$id])
                                              ->first();


        $this->response->file('Files'.DS.'manager'.DS.$this->Auth->user('institution.slug').DS.'orders'.DS. $state->path_order_details.'.pdf',['download'=>true]);
        return $this->response; 
    }
}
