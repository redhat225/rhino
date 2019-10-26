<?php
namespace App\Controller\Doctor;

use App\Controller\AppController;

/**
 * Treatments Controller
 *
 * @property \App\Model\Table\TreatmentsTable $Treatments
 */
class TreatmentsController extends AppController
{

    public function edit()
    {
        if($this->request->is('ajax'))
        {
            if($this->request->is('post'))
            {
                $data = $this->request->data;

                $treatment = $this->Treatments->find()
                                            ->where(['Treatments.visit_meeting_id'=>$data['visit_meeting_id']])->first();
                $treatment->description = $data['description'];
                $treatment->dirty('description',true);
                if($this->Treatments->save($treatment))
                {
                    echo 'ok';
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
