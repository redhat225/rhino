<?php
namespace App\Controller\Manager;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Institutions Controller
 *
 * @property \App\Model\Table\InstitutionsTable $Institutions
 */
class InstitutionsController extends AppController
{

    public function beforFilter(Event $event)
     {
        parent::beforFilter($event);
        $this->viewBuilder()->layout('dashboard');
     }

    public function index()
    {

    }


    public function planning()
    {
        if($this->request->is('ajax'))
        {
            $this->loadModel('InstitutionSchedules');
            if($this->request->is('get'))
            {
                $query_data = $this->request->query;

                if(isset($query_data['get_institution_planning']))
                {
                     
                     $schedules = $this->InstitutionSchedules->find()
                                                             ->where(['institution_id'=>$this->Auth->user('institution_id')]);
                    if($schedules)
                    {
                        echo json_encode($schedules);

                    }
                    else
                    {
                        echo 'ko';
                    }
                    exit();
                }
                else
                {

                }
            }

            if($this->request->is('post'))
            {
                $data = $this->request->data;

                switch($data['state-operation'])
                {
                    case 'add':

                        $schedules = $this->InstitutionSchedules->newEntity($data);
                        $schedules->institution_id = $this->Auth->user('institution_id');
                        $schedules->schedule_details='';

                        if($this->InstitutionSchedules->save($schedules))
                        {
                            echo 'ok';
                        }   
                        else
                        {
                            debug($schedules);
                            echo 'ko';
                        }

                    break;

                    case 'event-drop':
                        $planning  = $this->InstitutionSchedules->get($data['id']);
                            $planning->schedule_start = $data['schedule_start'];
                            $planning->schedule_end = $data['schedule_end'];
                            $planning->dirty(true);
                            if($this->InstitutionSchedules->save($planning))
                            {
                                echo 'ok';
                            }
                            else
                            {
                                echo 'ko';
                            }
                         
                    break;

                    case 'delete-event':
                        $planning = $this->InstitutionSchedules->get($data['event-id']);
                        if($planning->editable==0)
                        {
                            echo 'down';
                        }
                        else
                        {
                                if($this->InstitutionSchedules->delete($planning))
                                {
                                    echo 'ok';
                                }
                                 else
                                {
                                    echo 'ko';
                                }
                        }

                    break;
                }

                exit();
            }
        }
    }

    public function getOperators()
    {
        if($this->request->is('ajax'))
        {
            if($this->request->is('get'))
            {

                //manager_operators
                $this->loadModel('ManagerOperators');
                $manager_operators = $this->ManagerOperators->find()
                                                            ->contain(['People.PeopleContacts','Institutions'])
                                                            ->where(['ManagerOperators.institution_id'=>$this->Auth->user('institution_id')])
                                                            ->map(function($row){
                                                                $dateborn = new \DateTime($row->person->dateborn);
                                                                $row->person->dateborn = $dateborn->format('Y');

                                                                return $row;
                                                            });
                if($manager_operators)
                {
                    echo json_encode($manager_operators);
                }
                else
                {
                    echo 'ko';  
                }

                exit();

            }
        }
    }    

    public function getDoctors()
    {

        if($this->request->is('ajax'))
        {
            if($this->request->is('get'))
            {
                        //doctors
                $this->loadModel('Doctors');
                $doctors = $this->Doctors->find()
                                         ->contain(['People.PeopleContacts'])
                                         ->matching('Institutions', function($q){
                                            return $q->where(['Institutions.id'=>$this->Auth->user('id')]);
                                         })->map(function($row){
                                                                $dateborn = new \DateTime($row->person->dateborn);
                                                                $row->person->dateborn = $dateborn->format('Y');

                                                                return $row;
                                                            });
                if($doctors)
                {
                    echo json_encode($doctors);
                }
                else
                {
                    echo 'ko';
                }

                exit();
            }
        }

    }

    public function globalStateBuilder(){
        if($this->request->is('ajax'))
        {
            if($this->request->is('get'))
            {
                $query_data = $this->request->query;
               
                $start_date = $query_data['start-date-state'].' 00:00:00';
                $end_date = $query_data['end-date-state'].' 23:59:59';

                $formatted_start_date = new \DateTime($query_data['start-date-state']);
                $formatted_end_date = new \DateTime($query_data['end-date-state']);
                //loading bills
                 $this->loadModel('VisitInvoices');
                 $transactions = $this->VisitInvoices->find()
                                                            ->contain(['ManagerOperators.People','ManagerOperators.Institutions'=>function($q){return $q->where(['Institutions.id'=>$this->Auth->user('institution_id')]);},'Visits.Patients.People','VisitInvoicePayments.VisitInvoicePaymentSchedules'])
                                                            ->andWhere(function($q) use($start_date, $end_date){
                                                                return $q->between('VisitInvoices.created',$start_date, $end_date);
                                                            })
                                                            ->order(['VisitInvoices.created'=>'DESC'])
                                                            ->autoFields(true)
                                                            ->map(function($row){

                                                                    $countdown = 0;
                                                                    $count_sold = 0;
                                                                    $count_unsold = 0;
                                                                    foreach ($row->visit_invoice_payments as $payment) 
                                                                    {
                                                                        if($payment->state==1)
                                                                        {
                                                                            $count_sold++;
                                                                        }
                                                                        else
                                                                        {
                                                                            $count_unsold++;
                                                                        }

                                                                        $countdown++;
                                                                    }

                                                                    $row->count_payments=$countdown;
                                                                    $row->count_sold=$count_sold;
                                                                    $row->count_unsold=$count_unsold;

                                                                            $formatted_created = new \DateTime($row->created);
                                                                            $row->formatted_created = $formatted_created->format('d-m-Y H:i:s');

                                                                            if($row->sold_date)
                                                                            {
                                                                                $formatted_solded = new \DateTime($row->sold_date);
                                                                                $row->formatted_solded = $formatted_solded->format('d-m-Y H:i:s');
                                                                            }
                                                                            else
                                                                            {
                                                                                $row->formatted_solded = null;
                                                                            }

                                                                    return $row;
                                                            });
                
                //aggregation transaction query
                $aggr_transaction = $this->VisitInvoices->find()
                                                        ->contain(['ManagerOperators.Institutions'=>function($q){return $q->where(['Institutions.id'=>$this->Auth->user('institution_id')]);},'ManagerOperators.People'])
                                                        ->select(['sum_amount'=>'sum(VisitInvoices.amount)','avg_amount'=>'avg(VisitInvoices.amount)','count_invoices'=>'count(VisitInvoices.id)','max_invoice_amount'=>'max(VisitInvoices.amount)','min_invoice_amount'=>'min(VisitInvoices.amount)'])
                                                        ->where(function($q) use($start_date, $end_date){
                                                                    return $q->between('VisitInvoices.created',$start_date, $end_date);
                                                                  })
                                                        ->toArray();
                //aggregation transaction query2
                $total_invoice_recovered = $total_invoice_unrecovered = $total_payment_recovered = $total_payment_unrecovered = $total_sum_recovered = $total_sum_unrecovered = 0;
                foreach ($transactions as $transaction){
                    if($transaction->state==1)
                    {
                        $total_invoice_recovered++;
                    }
                    else
                    {
                        $total_invoice_unrecovered++;

                    }
                    foreach ($transaction->visit_invoice_payments as $payment){
                        if($payment->state==1)
                        {
                            $total_payment_recovered++;
                            $total_sum_recovered+=$payment->amount;
                        }
                        else
                        {
                            $total_payment_unrecovered++;
                            $total_sum_unrecovered+=$payment->amount;

                        }

                       
                    }
                }
                 
                 $visit_global_info = $this->VisitInvoices->Visits->find()
                                                                  ->contain(['ManagerOperators.People','Patients.People','VisitStates'=> function($q){return $q->order(['VisitStates.created'=>'DESC']);},'ManagerOperators.Institutions'=>function($q){return $q->where(['Institutions.id'=>$this->Auth->user('institution_id')]);}])
                                                                  ->where(function($q) use($start_date, $end_date){
                                                                    return $q->between('Visits.created',$start_date, $end_date);
                                                                  })->order(['Visits.created'=>'DESC'])->toArray();

                 $visit_global_grouping_info = $this->VisitInvoices->find()
                                                                     ->select(['total_sum'=>'sum(VisitInvoices.amount)','created_date'=>'DATE_FORMAT(VisitInvoices.created,"%d-%m-%Y")',
                                                                                                    ])
                                                                    ->contain(['ManagerOperators.Institutions'=>function($q){return $q->order(['Institutions.id'=>$this->Auth->user('institution_id')]);}])
                                                                    ->where(function($q) use($start_date, $end_date){
                                                                        return $q->between('VisitInvoices.created',$start_date,$end_date);
                                                                     })
                                                                    ->group(['created_date']);

                 //build url for pdf-view
                 $pdf_view_url = '/manager/institutions/global-state-builder/'.$start_date.'/'.$end_date.'/'.$this->Auth->user('id').'/.pdf';

                if($visit_global_info && $aggr_transaction && $transactions)
                {
                    $actual_consultation=$actual_surgery=$actual_hospy=$actual_meo=$actual_rea=$actual_nursery=$actual_emergency=$actual_booking=$actual_trauma = $enter_consultation = $exit_consultation=$enter_surgery=$exit_surgery=$enter_hospy=$exit_hospy=$enter_meo=$exit_meo=$enter_rea=$exit_rea=$enter_nursery=$exit_nursery=$enter_emergency=$exit_emergency=$enter_booking=$exit_booking=$enter_trauma=$exit_trauma = $count_registered_visit = $count_deleted_visit = $count_valid_visit =0;
                    foreach ($visit_global_info as $visit) {

                        if(!$visit->deleted)
                        {
                                switch($visit->visit_states[0]->visit_state_type_id)
                                {
                                    case 1:
                                    if($visit->visit_states[0]->state_end==null)
                                    {
                                        $actual_consultation++;
                                    }
                                    break;

                                    case 2:
                                    if($visit->visit_states[0]->state_end==null)
                                    {
                                        $actual_surgery++;
                                    }
                                    break;

                                    case 3:
                                    if($visit->visit_states[0]->state_end==null)
                                    {
                                        $actual_hospy++;
                                    }
                                    break;

                                    case 4:
                                    if($visit->visit_states[0]->state_end==null)
                                    {
                                        $actual_meo++;
                                    }
                                    break;

                                    case 5:
                                    if($visit->visit_states[0]->state_end==null)
                                    {
                                        $actual_rea++;
                                    }
                                    break;

                                    case 6:
                                    if($visit->visit_states[0]->state_end==null)
                                    {
                                        $actual_nursery++;
                                    }
                                    break;

                                    case 7:
                                    if($visit->visit_states[0]->state_end==null)
                                    {
                                        $actual_emergency++;
                                    }
                                    break; 

                                    case 8:
                                    if($visit->visit_states[0]->state_end==null)
                                    {
                                        $actual_booking++;
                                    }
                                    break;

                                    case 9:
                                    if($visit->visit_states[0]->state_end==null)
                                    {
                                        $actual_trauma++;
                                    }
                                    break;

                                }

                                foreach ($visit->visit_states as $state) 
                                {
                                    switch ($state->visit_state_type_id) {
                                        case 1:
                                            //if dmp living => the 2 cases are logic else one way !!!
                                            // if($state->state_end===null)
                                            // {
                                            //     $exit_consultation++;
                                            // }
                                            // else
                                            // {   
                                                $enter_consultation++;
                                            // }
                                        break;

                                        case 2:
                                            if($state->state_end!=null)
                                            {
                                                $exit_surgery++;
                                            }
                                            else
                                            {   
                                                $enter_surgery++;
                                            }
                                        break;

                                        case 3:
                                            if($state->state_end!=null)
                                            {
                                                $exit_hospy++;
                                            }
                                            else
                                            {   
                                                $enter_hospy++;
                                            }
                                        break;

                                        case 4:
                                            if($state->state_end!=null)
                                            {
                                                $exit_meo++;
                                            }
                                            else
                                            {   
                                                $enter_meo++;
                                            }
                                        break;

                                        case 5:
                                            if($state->state_end!=null)
                                            {
                                                $exit_rea++;
                                            }
                                            else
                                            {   
                                                $enter_rea++;
                                            }
                                        break;

                                        case 6:
                                            if($state->state_end!=null)
                                            {
                                                $exit_nursery++;
                                            }
                                            else
                                            {   
                                                $enter_nursery++;
                                            }
                                        break;

                                        case 7:
                                            if($state->state_end!=null)
                                            {
                                                $exit_emergency++;
                                            }
                                            else
                                            {   
                                                $enter_emergency++;
                                            }
                                        break; 

                                        case 8:
                                            if($state->state_end!=null)
                                            {
                                                $exit_booking++;
                                            }
                                            else
                                            {   
                                                $enter_booking++;
                                            }
                                        break;

                                        case 9:
                                            if($state->state_end!=null)
                                            {
                                                $exit_trauma++;
                                            }
                                            else
                                            {   
                                                $enter_trauma++;
                                            }
                                        break;
                                    }

                                }
                                $count_valid_visit++;
                        }
                        else
                            $count_deleted_visit++;


                        $count_registered_visit++;
                    }

                    $institution = $this->Auth->user('institution');
                    $this->set(compact('actual_consultation','actual_surgery','actual_hospy','actual_meo','actual_rea','actual_nursery','actual_emergency','actual_booking','actual_trauma','visit_global_info','aggr_transaction','transactions','institution','formatted_start_date','formatted_end_date','total_invoice_recovered','total_invoice_unrecovered','total_payment_recovered','total_payment_unrecovered','total_sum_recovered','total_sum_unrecovered','enter_consultation','enter_surgery','exit_surgery','enter_hospy','exit_hospy','enter_meo','exit_meo','enter_rea','exit_rea','enter_nursery','exit_nursery','enter_emergency','exit_emergency','enter_booking','exit_booking','enter_trauma','exit_trauma','count_registered_visit','count_deleted_visit','count_valid_visit','visit_global_grouping_info','pdf_view_url'));
                }
                else
                {
                    echo 'ko';
                    exit();
                }

            }
        }
        else
        {
            if($this->request->params['_ext']==='pdf')
            {
                $query_data = $this->request->params['pass'];
                $start_date = $query_data[0];
                $end_date = $query_data[1];

                $formatted_start_date = new \DateTime($start_date);
                $formatted_end_date = new \DateTime($end_date);

                //loading bills
                 $this->loadModel('VisitInvoices');
                 $transactions = $this->VisitInvoices->find()
                                                            ->contain(['ManagerOperators.People','ManagerOperators.Institutions'=>function($q){return $q->where(['Institutions.id'=>$this->Auth->user('institution_id')]);},'Visits.Patients.People','VisitInvoicePayments.VisitInvoicePaymentSchedules'])
                                                            ->andWhere(function($q) use($start_date, $end_date){
                                                                return $q->between('VisitInvoices.created',$start_date, $end_date);
                                                            })
                                                            ->order(['VisitInvoices.created'=>'DESC'])
                                                            ->autoFields(true)
                                                            ->map(function($row){

                                                                    $countdown = 0;
                                                                    $count_sold = 0;
                                                                    $count_unsold = 0;
                                                                    foreach ($row->visit_invoice_payments as $payment) 
                                                                    {
                                                                        if($payment->state==1)
                                                                        {
                                                                            $count_sold++;
                                                                        }
                                                                        else
                                                                        {
                                                                            $count_unsold++;
                                                                        }

                                                                        $countdown++;
                                                                    }

                                                                    $row->count_payments=$countdown;
                                                                    $row->count_sold=$count_sold;
                                                                    $row->count_unsold=$count_unsold;

                                                                            $formatted_created = new \DateTime($row->created);
                                                                            $row->formatted_created = $formatted_created->format('d-m-Y H:i:s');

                                                                            if($row->sold_date)
                                                                            {
                                                                                $formatted_solded = new \DateTime($row->sold_date);
                                                                                $row->formatted_solded = $formatted_solded->format('d-m-Y H:i:s');
                                                                            }
                                                                            else
                                                                            {
                                                                                $row->formatted_solded = null;
                                                                            }

                                                                    return $row;
                                                            });
                
                //aggregation transaction query
                $aggr_transaction = $this->VisitInvoices->find()
                                                        ->contain(['ManagerOperators.Institutions'=>function($q){return $q->where(['Institutions.id'=>$this->Auth->user('institution_id')]);},'ManagerOperators.People'])
                                                        ->select(['sum_amount'=>'sum(VisitInvoices.amount)','avg_amount'=>'avg(VisitInvoices.amount)','count_invoices'=>'count(VisitInvoices.id)','max_invoice_amount'=>'max(VisitInvoices.amount)','min_invoice_amount'=>'min(VisitInvoices.amount)'])
                                                        ->where(function($q) use($start_date, $end_date){
                                                                    return $q->between('VisitInvoices.created',$start_date, $end_date);
                                                                  })
                                                        ->toArray();
                //aggregation transaction query2
                $total_invoice_recovered = $total_invoice_unrecovered = $total_payment_recovered = $total_payment_unrecovered = $total_sum_recovered = $total_sum_unrecovered = 0;
                foreach ($transactions as $transaction){
                    if($transaction->state==1)
                    {
                        $total_invoice_recovered++;
                    }
                    else
                    {
                        $total_invoice_unrecovered++;

                    }
                    foreach ($transaction->visit_invoice_payments as $payment){
                        if($payment->state==1)
                        {
                            $total_payment_recovered++;
                            $total_sum_recovered+=$payment->amount;
                        }
                        else
                        {
                            $total_payment_unrecovered++;
                            $total_sum_unrecovered+=$payment->amount;

                        }

                       
                    }
                }
                 
                 $visit_global_info = $this->VisitInvoices->Visits->find()
                                                                  ->contain(['ManagerOperators.People','Patients.People','VisitStates'=> function($q){return $q->order(['VisitStates.created'=>'DESC']);},'ManagerOperators.Institutions'=>function($q){return $q->where(['Institutions.id'=>$this->Auth->user('institution_id')]);}])
                                                                  ->where(function($q) use($start_date, $end_date){
                                                                    return $q->between('Visits.created',$start_date, $end_date);
                                                                  })->order(['Visits.created'=>'DESC'])->toArray();

                 $visit_global_grouping_info = $this->VisitInvoices->find()
                                                                     ->select(['total_sum'=>'sum(VisitInvoices.amount)','created_date'=>'DATE_FORMAT(VisitInvoices.created,"%d-%m-%Y")',
                                                                                                    ])
                                                                    ->contain(['ManagerOperators.Institutions'=>function($q){return $q->order(['Institutions.id'=>$this->Auth->user('institution_id')]);}])
                                                                    ->where(function($q) use($start_date, $end_date){
                                                                        return $q->between('VisitInvoices.created',$start_date,$end_date);
                                                                     })
                                                                    ->group(['created_date']);

                if($visit_global_info && $aggr_transaction && $transactions)
                {
                    $actual_consultation=$actual_surgery=$actual_hospy=$actual_meo=$actual_rea=$actual_nursery=$actual_emergency=$actual_booking=$actual_trauma = $enter_consultation = $exit_consultation=$enter_surgery=$exit_surgery=$enter_hospy=$exit_hospy=$enter_meo=$exit_meo=$enter_rea=$exit_rea=$enter_nursery=$exit_nursery=$enter_emergency=$exit_emergency=$enter_booking=$exit_booking=$enter_trauma=$exit_trauma = $count_registered_visit = $count_deleted_visit = $count_valid_visit =0;
                    foreach ($visit_global_info as $visit) {

                        if(!$visit->deleted)
                        {
                                switch($visit->visit_states[0]->visit_state_type_id)
                                {
                                    case 1:
                                    if($visit->visit_states[0]->state_end==null)
                                    {
                                        $actual_consultation++;
                                    }
                                    break;

                                    case 2:
                                    if($visit->visit_states[0]->state_end==null)
                                    {
                                        $actual_surgery++;
                                    }
                                    break;

                                    case 3:
                                    if($visit->visit_states[0]->state_end==null)
                                    {
                                        $actual_hospy++;
                                    }
                                    break;

                                    case 4:
                                    if($visit->visit_states[0]->state_end==null)
                                    {
                                        $actual_meo++;
                                    }
                                    break;

                                    case 5:
                                    if($visit->visit_states[0]->state_end==null)
                                    {
                                        $actual_rea++;
                                    }
                                    break;

                                    case 6:
                                    if($visit->visit_states[0]->state_end==null)
                                    {
                                        $actual_nursery++;
                                    }
                                    break;

                                    case 7:
                                    if($visit->visit_states[0]->state_end==null)
                                    {
                                        $actual_emergency++;
                                    }
                                    break; 

                                    case 8:
                                    if($visit->visit_states[0]->state_end==null)
                                    {
                                        $actual_booking++;
                                    }
                                    break;

                                    case 9:
                                    if($visit->visit_states[0]->state_end==null)
                                    {
                                        $actual_trauma++;
                                    }
                                    break;

                                }

                                foreach ($visit->visit_states as $state) 
                                {
                                    switch ($state->visit_state_type_id) {
                                        case 1:
                                            //if dmp living => the 2 cases are logic else one way !!!
                                            // if($state->state_end===null)
                                            // {
                                            //     $exit_consultation++;
                                            // }
                                            // else
                                            // {   
                                                $enter_consultation++;
                                            // }
                                        break;

                                        case 2:
                                            if($state->state_end!=null)
                                            {
                                                $exit_surgery++;
                                            }
                                            else
                                            {   
                                                $enter_surgery++;
                                            }
                                        break;

                                        case 3:
                                            if($state->state_end!=null)
                                            {
                                                $exit_hospy++;
                                            }
                                            else
                                            {   
                                                $enter_hospy++;
                                            }
                                        break;

                                        case 4:
                                            if($state->state_end!=null)
                                            {
                                                $exit_meo++;
                                            }
                                            else
                                            {   
                                                $enter_meo++;
                                            }
                                        break;

                                        case 5:
                                            if($state->state_end!=null)
                                            {
                                                $exit_rea++;
                                            }
                                            else
                                            {   
                                                $enter_rea++;
                                            }
                                        break;

                                        case 6:
                                            if($state->state_end!=null)
                                            {
                                                $exit_nursery++;
                                            }
                                            else
                                            {   
                                                $enter_nursery++;
                                            }
                                        break;

                                        case 7:
                                            if($state->state_end!=null)
                                            {
                                                $exit_emergency++;
                                            }
                                            else
                                            {   
                                                $enter_emergency++;
                                            }
                                        break; 

                                        case 8:
                                            if($state->state_end!=null)
                                            {
                                                $exit_booking++;
                                            }
                                            else
                                            {   
                                                $enter_booking++;
                                            }
                                        break;

                                        case 9:
                                            if($state->state_end!=null)
                                            {
                                                $exit_trauma++;
                                            }
                                            else
                                            {   
                                                $enter_trauma++;
                                            }
                                        break;
                                    }

                                }
                                $count_valid_visit++;
                        }
                        else
                            $count_deleted_visit++;


                        $count_registered_visit++;
                    }

                    $institution = $this->Auth->user('institution');


                        $this->viewBuilder()->options([
                                                    'pdfConfig'=>[
                                                        'filename'=>'Etat Périodique du '.$formatted_start_date->format('d-m-Y').' au '.$formatted_end_date->format('d-m-Y'),
                                                        'margin' => [
                                                            'top' =>0,
                                                            'bottom' => 12.5,
                                                        ]
                                                    ]
                                                ]);

                    $this->set(compact('actual_consultation','actual_surgery','actual_hospy','actual_meo','actual_rea','actual_nursery','actual_emergency','actual_booking','actual_trauma','visit_global_info','aggr_transaction','transactions','institution','formatted_start_date','formatted_end_date','total_invoice_recovered','total_invoice_unrecovered','total_payment_recovered','total_payment_unrecovered','total_sum_recovered','total_sum_unrecovered','enter_consultation','enter_surgery','exit_surgery','enter_hospy','exit_hospy','enter_meo','exit_meo','enter_rea','exit_rea','enter_nursery','exit_nursery','enter_emergency','exit_emergency','enter_booking','exit_booking','enter_trauma','exit_trauma','count_registered_visit','count_deleted_visit','count_valid_visit','visit_global_grouping_info'));
                }
                else
                {
                    $this->Flash->error(__('Une erreur est survenue veuillez réessayer'));
                    return $this->redirect(['controller'=>'ManagerOperators','action'=>'general']);
                }
            }
            else
            {
                $this->Flash->error(__('Une erreur est survenue veuillez réessayer'));
                return $this->redirect(['controller'=>'ManagerOperators','action'=>'general']);
            }
        }
    }








}
