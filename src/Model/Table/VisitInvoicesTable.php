<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;
use Cake\Event\Event;
use ArrayObject;

/**
 * VisitInvoices Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Visits
 * @property \Cake\ORM\Association\BelongsTo $VisitInvoiceTypes
 * @property \Cake\ORM\Association\BelongsTo $ManagerOperators
 * @property \Cake\ORM\Association\HasMany $VisitInvoiceDetails
 * @property \Cake\ORM\Association\HasMany $VisitInvoicePayments
 * @property \Cake\ORM\Association\HasMany $VisitMeetings
 *
 * @method \App\Model\Entity\VisitInvoice get($primaryKey, $options = [])
 * @method \App\Model\Entity\VisitInvoice newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\VisitInvoice[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VisitInvoice|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VisitInvoice patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VisitInvoice[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\VisitInvoice findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class VisitInvoicesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('visit_invoices');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Visits', [
            'foreignKey' => 'visit_id',
            'joinType' => 'INNER'
        ]);
         $this->belongsTo('VisitInvoicePaymentWays', [
            'foreignKey' => 'visit_invoice_payment_way_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('VisitInvoiceTypes', [
            'foreignKey' => 'visit_invoice_type_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ManagerOperators', [
            'foreignKey' => 'manager_operator_id',
            'joinType' => 'INNER'
        ]);

        $this->hasOne('VisitInterventionDoctors', [
            'foreignKey' => 'visit_invoice_id'
        ]);

        $this->hasMany('VisitInvoiceDetails', [
            'foreignKey' => 'visit_invoice_id'
        ]);
        $this->hasMany('VisitInvoicePayments', [
            'foreignKey' => 'visit_invoice_id'
        ]);

        $this->belongsToMany('VisitInvoiceItems',[
                    'foreignKey' => 'visit_invoice_id',
                    'targetForeignKey' => 'visit_invoice_item_id',
                    'joinTable' => 'visit_invoice_details'
        ]);

        $this->belongsToMany('VisitActs',[
                'foreignKey' => 'visit_invoice_id',
                'targetForeignKey' => 'visit_act_id',
                'joinTable' => 'visit_invoice_details'
        ]);
    }


    public function beforeMarshal(Event $event, ArrayObject $data, ArrayObject $options)
    {
            switch ($data['state_visit'])
            {
                case 'saving_meeting_booking':

                break;


                case 'change_payment_method_booking':

                             $expected_date = new \DateTime('now + 14 days');
                             $payment_code_1 = uniqid();
                             $payment_code_2 = uniqid();
                             $data['visit_invoice_payments'] = Array();
                                  $data['state'] = 0;
                                  //build payment instance
                                $part_insurance = (($data['amount-bill-change-mode']*$data['perc_insurance_change_mode'])/100);
                                $part_insured = ($data['amount-bill-change-mode']-$part_insurance);
                                 
                                  $payment_visit_insurance = [
                                        'amount'=> $part_insurance,
                                        'amount_receive'=>0,
                                        'state' => 0,
                                        'visit_invoice_payment_method_id'=>2 ,
                                        'code_payment'=>'P-'.$payment_code_1,
                                        'reference_payment' => 'Carte Assuré: '.$data['insurance_patient_select'],
                                        'visit_invoice_payment_schedule'=>[
                                            'expected_date'=>$expected_date
                                        ]
                                    ];
                                
                                    $payment_visit_insured = [
                                        'label_invoice'=>'Reservation',
                                        'amount'=> $part_insured,
                                        'amount_receive'=>$data['amount_insurered_vers_change_mode'],
                                        'state' => 1,
                                        'visit_invoice_payment_method_id'=>1,
                                        'code_payment'=>'P-'.$payment_code_2,
                                        'path_payment'=>'P-'.$payment_code_2.'.pdf',
                                        'reference_payment' => 'Paiement Cash',
                                    ];

                                    array_push($data['visit_invoice_payments'],$payment_visit_insured);
                                    array_push($data['visit_invoice_payments'],$payment_visit_insurance);
                break;

                case 'saving_new_custom_bill':
                    $code_invoice =uniqid(true);
                    $data['state'] = 0;
                    $data['path_invoice']= 'F-'.$code_invoice.'.pdf';
                    $data['label_invoice'] = ucfirst($data['invoice_label']);
                    $data['visit_id'] = $data['visit_id'];
                    $data['manager_operator_id'] = $data['manager-id'];
                    $data['visit_invoice_type_id'] = 1;
                    $data['visit_invoice_payment_way_id']=0;
                    $data['code_invoice'] ='F-'.$code_invoice;

                    $sum_bill = 0;

                    if(isset($data['visit_other_id']))
                    {
                        $data['visit_invoice_items'] = [];
                        $length_other = count($data['visit_other_id']);
                        
                        for($i=0; $i<$length_other; $i++)
                        {
                            $data_other = [
                                'id' => $data['visit_other_id'][$i],
                                '_joinData' => [
                                    'label'=>$data['type_other_label'][$i],
                                    'qty' => $data['qte_other_item'][$i],
                                    'amount'=> $data['unit_price_other_item'][$i],
                                    'details'=>$data['description_other_bill'][$i]
                                ]
                            ];
                             array_push($data['visit_invoice_items'], $data_other);
                             $sum_bill += ($data['qte_other_item'][$i]*$data['unit_price_other_item'][$i]);
                        }
                       
                    }

                    if(isset($data['visit_act_id']))
                    {
                        $data['visit_acts'] = [];
                        $length_other = count($data['visit_act_id']);
                        for($i=0; $i<$length_other; $i++)
                        {
                            $data_other = [
                                'id' => $data['visit_act_id'][$i],
                                '_joinData' => [
                                    'label'=>$data['type_act_label'][$i],
                                    'qty' => $data['qte_act_item'][$i],
                                    'amount'=> $data['unit_price_act_item'][$i],
                                    'details'=>$data['description_act_bill'][$i]
                                ]
                            ];
                            array_push($data['visit_acts'], $data_other);
                            $sum_bill +=($data['qte_act_item'][$i]*$data['unit_price_act_item'][$i]);
                        }
                        
                    }


                    if(isset($data['label_custom_bill']))
                    {
                        $length_custom = count($data['label_custom_bill']);

                        for($i=0; $i<$length_custom; $i++){
                            $sum_bill+=($data['qte_custom_item'][$i]*$data['unit_price_custom_item'][$i]);
                        }
                    }

                    $data['amount'] = $sum_bill;

                break;

                case 'setting_payment_mode_visit_invoice':
                    switch($data['type'])
                    {
                        case 'cash':
                            $data['visit_invoice_payments'] = [];
                            $code = uniqid(true);
                            $payment = [
                                'amount' => $data['cash_setting_visit_mode_input'],
                                'reference_payment'=>'Paiement Cash',
                                'amount_receive'=>0,
                                'code_payment' => 'P-'.$code,
                                'path_payment' => 'P-'.$code.'.pdf',
                                'state' =>1,
                                'visit_invoice_payment_method_id' => 1
                            ];
                            array_push($data['visit_invoice_payments'], $payment);
                        break;

                        case 'cb':
                            $data['visit_invoice_payments'] = [];
                            $code = uniqid(true);
                            $payment = [
                                'amount' => $data['cb_setting_visit_mode_input'],
                                'reference_payment'=>$data['reference_cb_setting_visit_mode'],
                                'amount_receive'=>0,
                                'code_payment' => 'P-'.$code,
                                'state' =>0,
                                'visit_invoice_payment_method_id' => 2,
                                'visit_invoice_payment_schedule'=>
                                [
                                    'expected_date' => new \DateTime('NOW + 14 days')
                                ]
                            ];
                            array_push($data['visit_invoice_payments'], $payment);
                        break;

                        case 'insurance':
                             $expected_date = new \DateTime('now + 14 days');
                             $payment_code_1 = uniqid();
                             $payment_code_2 = uniqid();

                             $data['visit_invoice_payments'] = Array();
                                  $data['state'] = 0;
                                  //build payment instance
                                    $part_insurance = (($data['amount-bill-setting-mode']*$data['perc_insurance_setting_mode'])/100);
                                    $part_insured = ($data['amount-bill-setting-mode']-$part_insurance);
                                     
                                  $payment_visit_insurance = [
                                        'amount'=> $part_insurance,
                                        'amount_receive'=>0,
                                        'state' => 0,
                                        'visit_invoice_payment_method_id'=>2 ,
                                        'code_payment'=>'P-'.$payment_code_1,
                                        'reference_payment' => 'Carte Assuré: '.$data['insurance_patient_select'],
                                        'visit_invoice_payment_schedule'=>[
                                            'expected_date'=>$expected_date
                                        ]
                                    ];
                                    
                                    if($data['perc_insurance_setting_mode']!=100)
                                    {
                                        $payment_visit_insured = [
                                            'amount'=> $part_insured,
                                            'amount_receive'=>$data['amount_insurered_vers_setting_mode'],
                                            'state' => 1,
                                            'visit_invoice_payment_method_id'=>1,
                                            'code_payment'=>'P-'.$payment_code_2,
                                            'path_payment'=>'P-'.$payment_code_2.'.pdf',
                                            'reference_payment' => 'Paiement Cash',

                                        ];
                                        array_push($data['visit_invoice_payments'],$payment_visit_insured);
                                    }


                             array_push($data['visit_invoice_payments'],$payment_visit_insurance);
                        break;
                    }
                break;
            } 
    }
    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->decimal('amount')
            ->requirePresence('amount', 'create')
            ->notEmpty('amount');

        $validator
            ->dateTime('deleted')
            ->allowEmpty('deleted');

        $validator
            ->datetime('sold_date')
            ->allowEmpty('sold_date');

        $validator
            ->integer('state')
            ->requirePresence('state', 'create')
            ->notEmpty('state');

        return $validator;
    }

    public function afterSave($event, $entity, $options)
    {
        // if($entity->isNew())
        // {   
        //     if(isset($entity->state_invoice))
        //     {
        //         switch($entity->state_invoice)
        //         {
        //             case 'meeting':
        //                 //register a new Diary Token
        //                 $DiaryTokens = TableRegistry::get('DiaryTokens');
        //                 $data = [
        //                     'doctor_id_setting_privilege'=>$entity->doctor_id,
        //                     'validity' => 1,
        //                     'patient_id' => $entity->patient_id,
        //                 ];
        //                   //abort the last diary for the same doctor and patient if not expired
        //                   $last_active_diary_token = $DiaryTokens->find('activeToken',['doctor_id'=>$data['doctor_id_setting_privilege'],'patient_id'=>$data['patient_id']])->last();
                          
        //                   $already = false;
        //                   if($last_active_diary_token)
        //                   {
        //                           if($last_active_diary_token->result==="-")
        //                               $already = true;
        //                   }

        //                   if($already)
        //                   {
        //                     //abort the last diary_token and save the new diary_token
        //                       $last_active_diary_token->abort=1;
        //                       if(!$DiaryTokens->save($last_active_diary_token))
        //                         return false;
        //                   }

        //                 $diary_token = $DiaryTokens->newEntity($data,['associated'=>['Diaries']]);
        //                 if(!$DiaryTokens->save($diary_token))
        //                     return false;
        //             break;

        //             case 'booking':
        //                 if($entity->patient_booking_validation)
        //                 {
        //                     //change the state of the initial booking and linked to an id_meeting
        //                     $PatientBookings = TableRegistry::get('PatientBookings');
        //                     $patient_booking = $PatientBookings->get($entity->booking_patient_id);
        //                     $patient_booking->state = 1;
        //                     $patient_booking->visit_meeting_id = $entity->visit_meeting->id;
        //                     if(!$PatientBookings->save($patient_booking))
        //                         return false;
        //                 }
        //             break;
        //         }
        //     }
        // }
        // else
        // {

        // }
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['visit_id'], 'Visits'));
        $rules->add($rules->existsIn(['visit_invoice_type_id'], 'VisitInvoiceTypes'));
        $rules->add($rules->existsIn(['manager_operator_id'], 'ManagerOperators'));
        $rules->add($rules->existsIn(['visit_invoice_payment_way_id'], 'VisitInvoicePaymentWays'));

        return $rules;
    }

    public function findMonthlyPaid(Query $query, array $options)
    {
        $now = new \DateTime('NOW');
       
        $query->contain(['VisitInvoicePayments.VisitInvoicePaymentMethods','VisitInvoicePayments.VisitInvoicePaymentSchedules','ManagerOperators.Institutions'])
                ->select(['format_solded'=>'DATE_FORMAT(VisitInvoices.sold_date,"%d-%m-%Y %H:%i:%s")','format_created'=>'DATE_FORMAT(VisitInvoices.created,"%d-%m-%Y %H:%i:%s")'])
                ->order(['VisitInvoices.sold_date'=>'DESC'])
                ->where(['VisitInvoices.state'=>1,'DATE_FORMAT(VisitInvoices.created,"%m-%Y")'=>$now->format('m-Y')])
                ->autoFields(true);

            return $query;
    }

    public function findMonthlyUnpaid(Query $query, array $options)
    {
        $now = new \DateTime('NOW');
        return $query->contain(['VisitInvoicePayments.VisitInvoicePaymentMethods','ManagerOperators.Institutions','VisitInvoicePayments.VisitInvoicePaymentSchedules'])
                ->select(['format_solded'=>'DATE_FORMAT(VisitInvoices.sold_date,"%d-%m-%Y %H:%i:%s")','format_created'=>'DATE_FORMAT(VisitInvoices.created,"%d-%m-%Y %H:%i:%s")'])
                ->order(['VisitInvoices.created'=>'DESC'])
                ->where(['VisitInvoices.state'=>0,'DATE_FORMAT(VisitInvoices.created,"%m-%Y")'=>$now->format('m-Y')])
                ->autoFields(true);
    }

    public function findMonthlyNumber(Query $query, array $options)
    {
        $now = new \DateTime('NOW');
        return $query->where(['DATE_FORMAT(VisitInvoices.created,"%m-%Y")'=>$now->format('m-Y')])
                        ->andWhere(function($exp,$q){
                            return $exp->isNull('deleted');
                        })
                        ->select(['total'=>'sum(VisitInvoices.amount)']);
    }

        public function findAnnualNumber(Query $query, array $options)
    {
        $now = new \DateTime('NOW');
        return $query->where(['DATE_FORMAT(VisitInvoices.created,"%Y")'=>$now->format('Y')])
                        ->andWhere(function($exp,$q){
                            return $exp->isNull('deleted');
                        })
                        ->select(['total'=>'sum(VisitInvoices.amount)']);
    }

    public function findEntire(Query $query, array $options)
    {
        return $query->contain(['VisitInvoicePayments.VisitInvoicePaymentMethods','VisitInvoicePayments.VisitInvoicePaymentSchedules','Visits.Patients.People','ManagerOperators.Institutions','ManagerOperators.People'])
            ->select(['formatted_created'=>'DATE_FORMAT(VisitInvoices.created,"%d-%m-%Y %H:%i:%s")','formatted_solded'=>'DATE_FORMAT(VisitInvoices.sold_date,"%d-%m-%Y %H:%i:%s")'])
            ->order(['VisitInvoices.created'=>'DESC'])
            ->distinct(['VisitInvoices.id'])
            ->autoFields(true)
            ->map(function($row){
                
                $countdown = 0;
                $search = true;

                while($search) 
                {
                    if(file_exists(WWW_ROOT."Files/manager/".$row->manager_operator->institution->slug."/invoices_images/".$row->code_invoice.'-'.$countdown.'.jpg'))
                    {
                        $countdown++;
                    }
                    else
                    {
                        $search = false;
                        $row->bill_image_count = $countdown;
                    }
                    
                }
                
                return $row;

            });
    }


    public function findEntireByAmountAll(Query $query, array $options)
    {
        return $query->contain(['VisitInvoicePayments.VisitInvoicePaymentMethods','VisitInvoicePayments.VisitInvoicePaymentSchedules','Visits.Patients.People','ManagerOperators.Institutions','ManagerOperators.People'])
            ->select(['formatted_created'=>'DATE_FORMAT(VisitInvoices.created,"%d-%m-%Y %H:%i:%s")','formatted_solded'=>'DATE_FORMAT(VisitInvoices.sold_date,"%d-%m-%Y %H:%i:%s")'])
            ->order(['VisitInvoices.created'=>'DESC'])
            ->distinct(['VisitInvoices.id'])
            ->where(function($q) use($options){
                    return $q->between('VisitInvoices.amount',$options['min'],$options['max']);
            })
            ->autoFields(true)
            ->map(function($row){
                
                $countdown = 0;
                $search = true;

                while($search) 
                {
                    if(file_exists(WWW_ROOT."Files/manager/".$row->manager_operator->institution->slug."/invoices_images/".$row->code_invoice.'-'.$countdown.'.jpg'))
                    {
                        $countdown++;
                    }
                    else
                    {
                        $search = false;
                        $row->bill_image_count = $countdown;
                    }
                    
                }
                
                return $row;

            });
    }

    public function findEntireByDateAll(Query $query, array $options)
    {
        return $query->contain(['VisitInvoicePayments.VisitInvoicePaymentMethods','VisitInvoicePayments.VisitInvoicePaymentSchedules','Visits.Patients.People','ManagerOperators.Institutions','ManagerOperators.People'])
            ->select(['formatted_created'=>'DATE_FORMAT(VisitInvoices.created,"%d-%m-%Y %H:%i:%s")','formatted_solded'=>'DATE_FORMAT(VisitInvoices.sold_date,"%d-%m-%Y %H:%i:%s")'])
            ->order(['VisitInvoices.created'=>'DESC'])
            ->distinct(['VisitInvoices.id'])
            ->where(function($q) use($options){
                    return $q->between('VisitInvoices.created',$options['date-from'],$options['date-to']);
            })
            ->autoFields(true)
            ->map(function($row){
                
                $countdown = 0;
                $search = true;

                while($search) 
                {
                    if(file_exists(WWW_ROOT."Files/manager/".$row->manager_operator->institution->slug."/invoices_images/".$row->code_invoice.'-'.$countdown.'.jpg'))
                    {
                        $countdown++;
                    }
                    else
                    {
                        $search = false;
                        $row->bill_image_count = $countdown;
                    }
                    
                }
                
                return $row;

            });
    }



    public function findSingle(Query $query, array $options)
    {
        return $query->contain(['VisitInvoicePayments.VisitInvoicePaymentMethods','VisitInvoicePayments.VisitInvoicePaymentSchedules','Visits.Patients.People.PeopleContacts','ManagerOperators.Institutions','ManagerOperators.People'])
            ->where(['VisitInvoices.id'=>$options['id-bill']])
            ->andWhere(['ManagerOperators.institution_id'=>$options['institution_id']])
            ->select(['formatted_created'=>'DATE_FORMAT(VisitInvoices.created,"%d-%m-%Y %H:%i:%s")','formatted_solded'=>'DATE_FORMAT(VisitInvoices.sold_date,"%d-%m-%Y %H:%i:%s")'])
            ->order(['VisitInvoices.created'=>'DESC'])
            ->distinct(['VisitInvoices.id'])
            ->autoFields(true)
            ->map(function($row){

                $countdown = 0;
                $search = true;

                while($search) 
                {
                    if(file_exists(WWW_ROOT."Files/manager/".$row->manager_operator->institution->slug."/invoices_images/".$row->code_invoice.'-'.$countdown.'.jpg'))
                    {
                        $countdown++;
                    }
                    else
                    {
                        $search = false;
                        $row->bill_image_count = $countdown;
                    }
                    
                }

                


                foreach($row->visit_invoice_payments as $payment)
                {
                    $search = true;
                    $countdown_voucher = 0;

                    while($search) 
                    {
                        if(file_exists(WWW_ROOT."Files/manager/".$row->manager_operator->institution->slug."/vouchers_images/".$payment->code_payment.'-'.$countdown_voucher.'.jpg'))
                        {
                            $countdown_voucher++;
                        }
                        else
                        {
                            $search = false;
                            $payment->voucher_image_count = $countdown_voucher;
                        }
                                                                
                    }   

                    if($payment->visit_invoice_payment_schedule)
                    {
                        $created_schedule = new \DateTime($payment->visit_invoice_payment_schedule->expected_date);
                        $payment->formatted_created_schedule = $created_schedule->format('d-m-Y H:i:s');
                        if($payment->visit_invoice_payment_schedule->sold_date)
                        {
                            $sold_schedule = new \DateTime($payment->visit_invoice_payment_schedule->sold_date);
                            $payment->formatted_solded_schedule = $sold_schedule->format('d-m-Y H:i:s');
                        }

                    }

                  $created_payment  = new \DateTime($payment->created);
                  $payment->formatted_created = $created_payment->format('d-m-Y H:i:s');

                }

                
                return $row;

            });
    }

    public function findEntireByDate(Query $query, array $options)
    {

        return $query->contain(['VisitInvoicePayments.VisitInvoicePaymentMethods','VisitInvoicePayments.VisitInvoicePaymentSchedules','Visits.Patients.People'])
            ->select(['formatted_created'=>'DATE_FORMAT(VisitInvoices.created,"%d-%m-%Y %H:%i:%s")','formatted_solded'=>'DATE_FORMAT(VisitInvoices.sold_date,"%d-%m-%Y %H:%i:%s")'])
            ->order(['DATE_FORMAT(VisitInvoices.created,"%Y-%m-%d")'=>'ASC'])
            ->distinct(['VisitInvoices.id'])
            ->where(['DATE_FORMAT(VisitInvoices.created,"%Y-%m-%d") >='=>$options['begin']])
            ->andWhere(['DATE_FORMAT(VisitInvoices.created,"%Y-%m-%d") <='=>$options['end']])
            ->autoFields(true);
    }

    public function findEntireByAmount(Query $query, array $options)
    {

        return $query->contain(['VisitInvoicePayments.VisitInvoicePaymentMethods','VisitInvoicePayments.VisitInvoicePaymentSchedules','Visits.Patients.People'])
            ->select(['formatted_created'=>'DATE_FORMAT(VisitInvoices.created,"%d-%m-%Y %H:%i:%s")','formatted_solded'=>'DATE_FORMAT(VisitInvoices.sold_date,"%d-%m-%Y %H:%i:%s")'])
            ->order(['VisitInvoices.amount'=>'ASC'])
            ->distinct(['VisitInvoices.id'])
            ->where(['VisitInvoices.amount >='=>$options['min']])
            ->andWhere(['VisitInvoices.amount <='=>$options['max']])
            ->autoFields(true);
    }


}
