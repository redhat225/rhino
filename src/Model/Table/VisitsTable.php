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
 * Visits Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Patients
 * @property \Cake\ORM\Association\HasMany $VisitConstants
 * @property \Cake\ORM\Association\HasMany $VisitInterventionAuxiliaries
 * @property \Cake\ORM\Association\HasMany $VisitInterventionDoctors
 * @property \Cake\ORM\Association\HasMany $VisitInvoices
 * @property \Cake\ORM\Association\HasMany $VisitStates
 * @property \Cake\ORM\Association\HasMany $VisitTasks
 *
 * @method \App\Model\Entity\Visit get($primaryKey, $options = [])
 * @method \App\Model\Entity\Visit newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Visit[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Visit|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Visit patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Visit[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Visit findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class VisitsTable extends Table
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

        $this->table('visits');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Patients', [
            'foreignKey' => 'patient_id',
            'joinType' => 'INNER'
        ]);


        $this->belongsTo('VisitSpecialities', [
            'foreignKey' => 'visit_speciality_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ManagerOperators',[
                'foreignKey' => 'manager_operator_id',
                'joinType' => 'INNER'
            ]);
        $this->hasMany('VisitConstants', [
            'foreignKey' => 'visit_id'
        ]);
        $this->hasMany('VisitInterventionAuxiliaries', [
            'foreignKey' => 'visit_id'
        ]);
        $this->hasMany('VisitInterventionDoctors', [
            'foreignKey' => 'visit_id'
        ]);
        $this->hasMany('VisitInvoices', [
            'foreignKey' => 'visit_id'
        ]);
        $this->hasMany('VisitStates', [
            'foreignKey' => 'visit_id'
        ]);
        $this->hasMany('VisitTasks', [
            'foreignKey' => 'visit_id'
        ]);
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
            ->dateTime('expected_meeting_date')
            ->allowEmpty('expected_meeting_date');

        $validator
            ->requirePresence('visit_motif', 'create')
            ->notEmpty('visit_motif');

        $validator
            ->requirePresence('code_visit', 'create')
            ->notEmpty('code_visit');

        $validator
            ->dateTime('deleted')
            ->allowEmpty('deleted');

        return $validator;
    }

    public function beforeMarshal(Event $event, ArrayObject $data, ArrayObject $options)
    {
        //marshalling data in case of meeting and booking visit_type_invoices
        switch ($data['state_visit']) 
        {
            case 'saving_meeting_booking':
                //building visit code
                $Visits = TableRegistry::get('Visits');
                $visit_count = $Visits->find()
                                     ->where(['Visits.patient_id'=>$data['patient_id']])
                                     ->count();

                $nowDate = new \DateTime('NOW');
                $visit_code = 'V'.($visit_count+1).'-'.$nowDate->format('dmY').'-'.$data['visit_speciality_tag'];
                $data['code_visit'] = $visit_code;
                
                //building visit_intervention_doctor
                $nowDate = new \DateTime('NOW');


                if($data['visit_type_id']!=7)
                {
                    if($data['visit_invoice_payment_way_id']!=4)
                    {
                        $visit_invoice_type = 2;
                        $data['visit_intervention_doctors']=[
                            [
                                'expected_meeting_date' => $nowDate->format('Y-m-d H:i:s'),
                                'doctor_id' => $data['doctor_id'],
                                'intervention_done' => null,
                                   'visit_acts' => []
                            ]
                        ];
                    }
                    else
                    {
                        $visit_invoice_type = 3;
                         $data['visit_intervention_doctors']=[
                            [
                                'visit_speciality_id' => $data['visit_speciality_id'],
                                'expected_meeting_date' => $data['booking_reference'].' '.$data['booking_reference_time'].':00',
                                'doctor_id' => $data['doctor_id'],
                                'intervention_done' =>null,
                                'visit_invoice_id' => null,
                                'patient_booking' => [
                                        'doctor_id' => $data['doctor_id'],
                                        'visit_speciality_id' => $data['visit_speciality_id'],
                                        'patient_id' => $data['patient_id'],
                                        'institution_id' => $data['institution_id'],
                                        'state'=>1,
                                        'expected_date_booking' => $data['booking_reference'].' '.$data['booking_reference_time'].':00',
                                        'state_invoice' => 'saving_meeting_booking'
                                ],
                                'visit_acts' => []
                            ]
                        ];
                    } 
                }


                //building visit_state
                if($data['visit_type_id']==7)
                {
                    $visit_authorized=1;
                    $data['visit_invoice_payment_way_id']=0;
                }
                else
                {
                       $visit_authorized=1;   
                }

                $data['visit_states']=[
                   [
                    'visit_level_id' => $data['visit_level_id'],
                    'visit_kind_transport_id' =>$data['visit_kind_transport_id'],
                    'visit_authorized' => $visit_authorized,
                    'visit_state_type_id' => $data['visit_type_id'],
                    // extra info for schedule builder
                    'code_visit'=>$visit_code,
                    'patient_id'=>$data['patient_id'],
                    'hospy_motif' => $data['visit_motif'],
                    'institution_id'=>$data['institution_id']
                    ]
                ];


                //switching ste_type_id in the case of a booking
                if($data['visit_invoice_payment_way_id']=='4' || $data['visit_type_id']==7)
                {
                    if($data['visit_invoice_payment_way_id']=='4')
                    $data['visit_states'][0]['visit_state_type_id']=8;

                    if($data['visit_type_id']==7)
                    $data['visit_states'][0]['visit_state_type_id']=7;

                    $data['visit_states'][0]['state_begin']=new \DateTime('NOW');
                }
                else
                {
                    $data['visit_states'][0]['state_begin']=new \DateTime('NOW');
                }

                //building visit_invoice
                if($data['visit_invoice_payment_way_id']!=='4')
                     $label_invoice='rendez-vous';
                else
                {
                     $label_invoice = 'réservation';
                }
                $code_invoice='F-'.uniqid();  

                if($data['visit_invoice_payment_way_id']==1)
                {
                    $state_invoice = 1;
                    $sold_date = new \DateTime('NOW');
                }
                else
                {
                    $state_invoice = 0;
                    $sold_date = null;
                }

                //calculate any additional item
                $total_amount = 0;
                if(isset($data['visit_invoice_item_id']))
                {
                    
                    for($i=0;$i<count($data['visit_invoice_item_id']);$i++)
                    {
                        $partial_amount = $data['amount'][$i] * $data['qty'][$i];
                        $total_amount+=$partial_amount;
                    }
                }
                $amount = $data['montant'] + $total_amount;

                if(($data['visit_type_id']!=7) && ($data['visit_invoice_payment_way_id']!='4'))
                {
                  $data['visit_invoices']=[
                    [
                        'label_invoice' => $label_invoice,
                        'code_invoice' => $code_invoice,
                        'path_invoice' => $code_invoice.'.pdf',
                        'state' => $state_invoice,
                        'visit_invoice_type_id' => $visit_invoice_type,
                        'amount' => $amount,
                        'sold_date' => $sold_date,
                        'visit_invoice_payment_way_id' => $data['visit_invoice_payment_way_id'],
                        'manager_operator_id' => $data['manager_operator_id'],
                        'visit_invoice_payments' => [],
                        'state_visit'=>'saving_meeting_booking',
                        'visit_invoice_items' => [] 
                    ]
                  ];
                
                //building visit_invoice_items
                    $visit_item = [
                        'id' => 5,
                        '_joinData' => [
                            'qty' => 1,
                            'amount' => $data['montant']
                        ]
                    ];
                
                array_push($data['visit_invoices'][0]['visit_invoice_items'], $visit_item);
                if(isset($data['visit_invoice_item_id']))
                {
                    
                    for($i=0;$i<count($data['visit_invoice_item_id']);$i++)
                    {
                        $visit_item = [
                            'id'=> $data['visit_invoice_item_id'][$i],
                            '_joinData' => [
                                'qty' => $data['qty'][$i],
                                'amount' => $data['amount'][$i]
                            ]
                        ];

                     array_push($data['visit_invoices'][0]['visit_invoice_items'], $visit_item);

                    }
                }

                //switching cases for type payment
                switch($data['visit_invoice_payment_way_id'])
                        {
                            case '1':
                                    $now_sold_date = new \DateTime('NOW');
                                    $data['sold_date']=$now_sold_date->format('Y-m-d H:i:s');
                                    $payment_code = uniqid();
                                    $data['state'] = 1;
                                    //build payment instance
                                    $payment_visit = [
                                        'amount'=> $data['montant'],
                                        'amount_receive'=>$data['amount_cash'],
                                        'reference_payment' => 'Paiement Cash',
                                        'state' => 1,
                                        'visit_invoice_payment_method_id'=>1,
                                        'code_payment'=>'P-'.$payment_code,
                                        'path_payment'=>'P-'.$payment_code.'.pdf'
                                    ];
                                    array_push($data['visit_invoices'][0]['visit_invoice_payments'],$payment_visit);
                            break;

                            case '2':
                                    $expected_date = new \DateTime('now + 10 days');
                                    $payment_code = uniqid();
                                    $data['state'] = 0;
                                    //build payment instance
                                    $payment_visit = [
                                        'amount'=> $data['montant'],
                                        'amount_receive'=>0,
                                        'state' => 0,
                                        'visit_invoice_payment_method_id'=>2,
                                        'code_payment'=>'P-'.$payment_code,
                                        'reference_payment' => $data['bank_reference'],
                                        'visit_invoice_payment_schedule'=>[
                                            'expected_date'=>$expected_date
                                        ]
                                    ];
                                    array_push($data['visit_invoices'][0]['visit_invoice_payments'],$payment_visit);
                            break;

                            case '3':
                             $expected_date = new \DateTime('now + 14 days');
                             $payment_code_1 = uniqid();
                             $payment_code_2 = uniqid();

                                  $data['state'] = 0;
                                  //build payment instance
                                $part_insurance = (($data['montant']*$data['perc_insurance'])/100);
                                $part_insured = ($data['montant']-$part_insurance);
                                 
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
                                        'amount'=> $part_insured,
                                        'amount_receive'=>$data['amount_insurered_vers'],
                                        'state' => 1,
                                        'visit_invoice_payment_method_id'=>1,
                                        'code_payment'=>'P-'.$payment_code_2,
                                        'path_payment'=>'P-'.$payment_code_2.'.pdf',
                                        'reference_payment' => 'Paiement Cash',
                                    ];

                                    array_push($data['visit_invoices'][0]['visit_invoice_payments'],$payment_visit_insured);
                                  array_push($data['visit_invoices'][0]['visit_invoice_payments'],$payment_visit_insurance);
                            break;

                            case 4:
                                    $payment_code = uniqid();
                                    $data['state'] = 0;
                                    //build payment instance
                                    $date_exp_meeting = new \DateTime($data['booking_reference']);
                                    $time_exp_meeting = $data['booking_reference_time'];
                                    $datetime_exp_meeting = $date_exp_meeting->format('Y-m-d').' '.$time_exp_meeting.':00';
                                    $payment_visit = [
                                        'amount'=> $data['montant'],
                                        'amount_receive'=>0,
                                        'state' => 0,
                                        'visit_invoice_payment_method_id'=>1,
                                        'code_payment'=>'P-'.$payment_code,
                                        'reference_payment' => 'Réservation',
                                        'visit_invoice_payment_schedule'=>[
                                            'expected_date'=>$datetime_exp_meeting
                                        ]
                                    ];
                                    array_push($data['visit_invoices'][0]['visit_invoice_payments'],$payment_visit);
                            break;

                            case 5:
                             $data['state'] = 0;
                                    for($i=0;$i<count($data['multiple_payment']);$i++)
                                    {
                                        if($data['multiple_payment'][$i]!=='')
                                        {
                                            $payment_code = uniqid();
                                            $payment_visit = [
                                                'amount'=> $data['multiple_payment'][$i],
                                                'state' => 0,
                                                'amount_receive'=>0,
                                                'visit_invoice_payment_method_id'=>1,
                                                'code_payment'=>'P-'.$payment_code,
                                                'reference_payment' => 'Paiement par Echelonnement',
                                                'visit_invoice_payment_schedule'=>[
                                                    'expected_date'=>$data['multiple_payment_dates'][$i].' 00:00:00'
                                                ]
                                            ];
                                            array_push($data['visit_invoices'][0]['visit_invoice_payments'],$payment_visit);
                                        }

                                    }
                            break;
                        }
                }

                
            break;

            case 'change_payment_mode_booking':

                switch($data['kind_solvment'])
                {
                    case 'insurance':
                        $visit_invoice_payment_way_id = 3;
                        $data['state_invoice'] = 0;
                        $amount = $data['amount-bill-change-mode'];
                        $sold_date =null;
                    break;


                    case 'cash':
                        $visit_invoice_payment_way_id = 1;
                        $data['state_invoice'] = 1;
                        $amount = $data['amount_cash_booking_mode'];
                        $sold_date = new \DateTime();
                    break;

                    case 'cb':
                        $visit_invoice_payment_way_id = 2;
                        $data['state_invoice'] = 0;
                        $amount = $data['amount_cash_cb'];
                        $sold_date =null;
                    break;
                }

                  $label_invoice = 'Réservation';

                  $code_invoice='F-'.uniqid();  
                  
                  $data['visit_invoices']=[
                    [
                        'label_invoice' => $label_invoice,
                        'code_invoice' => $code_invoice,
                        'path_invoice' => $code_invoice.'.pdf',
                        'state' => $data['state_invoice'],
                        'visit_invoice_type_id' => 3,
                        'amount' => $amount,
                        'sold_date' => $sold_date,
                        'visit_invoice_payment_way_id' => $visit_invoice_payment_way_id,
                        'manager_operator_id' => $data['manager_operator_id'],
                        'visit_invoice_payments' => [],
                        'state_visit'=>'change_payment_mode_booking',
                        'visit_invoice_items' => [] 
                    ]
                  ];
                
                //building visit_invoice_items

                    $visit_item = [
                        'id' => 4,
                        '_joinData' => [
                            'qty' => 1,
                            'amount' => $amount
                        ]
                    ];
                
                array_push($data['visit_invoices'][0]['visit_invoice_items'], $visit_item);

                // switching cases for type payment
                switch($visit_invoice_payment_way_id)
                        {
                            case '1':
                                    $now_sold_date = new \DateTime('NOW');
                                    $data['sold_date']=$now_sold_date->format('Y-m-d H:i:s');
                                    $payment_code = uniqid();
                                    $data['state'] = 1;
                                    //build payment instance
                                    $payment_visit = [
                                        'amount'=> $amount,
                                        'amount_receive'=>$data['amount_cash_change_mode'],
                                        'reference_payment' => 'Paiement Cash',
                                        'state' => 1,
                                        'visit_invoice_payment_method_id'=>1,
                                        'code_payment'=>'P-'.$payment_code,
                                        'path_payment'=>'P-'.$payment_code.'.pdf'
                                    ];
                                    array_push($data['visit_invoices'][0]['visit_invoice_payments'],$payment_visit);
                            break;

                            case '2':
                                    $expected_date = new \DateTime('now + 14 days');
                                    $payment_code = uniqid();
                                    $data['state'] = 0;
                                    //build payment instance
                                    $payment_visit = [
                                        'amount'=> $amount,
                                        'amount_receive'=>0,
                                        'state' => 0,
                                        'visit_invoice_payment_method_id'=>2,
                                        'code_payment'=>'P-'.$payment_code,
                                        'reference_payment' => $data['bank_reference_change_mode'],
                                        'visit_invoice_payment_schedule'=>[
                                            'expected_date'=>$expected_date
                                        ]
                                    ];
                                    array_push($data['visit_invoices'][0]['visit_invoice_payments'],$payment_visit);
                            break;

                            case '3':
                             $expected_date = new \DateTime('now + 14 days');
                             $payment_code_1 = uniqid();
                             $payment_code_2 = uniqid();

                                  $data['state'] = 0;
                                  //build payment instance
                                $part_insurance = (($amount*$data['perc_insurance_change_mode'])/100);
                                $part_insured = ($amount-$part_insurance);
                                 
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
                                        'amount'=> $part_insured,
                                        'amount_receive'=>$data['amount_insurered_vers_change_mode'],
                                        'state' => 1,
                                        'visit_invoice_payment_method_id'=>1,
                                        'code_payment'=>'P-'.$payment_code_2,
                                        'path_payment'=>'P-'.$payment_code_2.'.pdf',
                                        'reference_payment' => 'Paiement Cash',
                                    ];

                                    array_push($data['visit_invoices'][0]['visit_invoice_payments'],$payment_visit_insured);
                                  array_push($data['visit_invoices'][0]['visit_invoice_payments'],$payment_visit_insurance);
                            break;
                        }
            break;


            case 'cancelBooking':

            break;
        }
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
        $rules->add($rules->existsIn(['patient_id'], 'Patients'));
        $rules->add($rules->existsIn(['visit_speciality_id'], 'VisitSpecialities'));
        $rules->add($rules->existsIn(['manager_operator_id'], 'ManagerOperators'));
        return $rules;
    }

    public function afterSave($event,$entity, $options)
    {
        if($entity->isNew())
        {
            if(isset($entity->state_visit))
            {
                switch($entity->state_visit)
                {
                    case 'saving_meeting_booking':
                        $InstitutionSchedules = TableRegistry::get('InstitutionSchedules');

                        $schedule = $InstitutionSchedules->newEntity();
                        $schedule->institution_id = $entity->institution_id;

                        if($entity->visit_invoice_payment_way_id!=4)
                        {
                            switch($entity->visit_type_id)
                            {
                                case 1:
                                    $schedule_title = 'Consultation';
                                    $schedule_type='meeting';
                                    $speciality = $entity->search_speciality;
                                    $doctor = $entity->search_doctor;
                                break;

                                case 7:
                                    $schedule_title = 'Urgences';
                                    $schedule_type='emergency';
                                    $speciality =  $doctor ='';
                                    if($entity->patient_id==0)
                                    {
                                        $age_anonym = $entity->age_anonym_patient;
                                        $sexe_anonym = $entity->sexe_anonym_patient;
                                        $is_anonymous_emergency = true;
                                    }
                                break;
                            }      
                            $schedule->schedule_start = $entity->created;                 
                        }
                        else
                        {
                            $schedule_title = 'Réservation';
                            $schedule_type='booking';
                            $speciality = $entity->search_speciality;
                            $doctor = $entity->search_doctor;
                            $schedule->schedule_start = $entity->booking_reference.' '.$entity->booking_reference_time.':00';
                        }

                       $additional_info_schedule = [
                            'specialite' => $speciality,
                            'medecin' => $doctor,
                            'patient' => $entity->patient_id,
                            'motif' => $entity->visit_motif,
                            'etat' => $entity->visit_level_id,
                            'transport' => $entity->visit_kind_transport_id,
                            'visit' => $entity->code_visit
                        ];

                        if(isset($is_anonymous_emergency))
                        {
                            $additional_info_schedule['age_anonym'] = $age_anonym;
                            $additional_info_schedule['sexe_anonym'] = $sexe_anonym;
                        }

                        $schedule->schedule_type = $schedule_type;
                        $schedule->editable = 0;
                        $schedule->repeated = 0;
                        $schedule->schedule_title = $schedule_title;
                        
                        $schedule->schedule_details = json_encode($additional_info_schedule);

                        if(!$InstitutionSchedules->save($schedule))
                            return false;
                    break;

                }
            }


        }
    }

    public function findEntire(Query $query, array $options)
    {
             return  $query->contain(['ManagerOperators.People','Patients.People','VisitStates'=>function($q){
                                                return $q->order(['VisitStates.created'=>'DESC']);
                                       },'VisitInterventionDoctors.VisitInvoices'])->order(['Visits.created'=>'DESC'])->autoFields(true)->map(function($row){
                                                foreach ($row->visit_states as $visit) 
                                                {

                                                    if($visit->state_begin)
                                                    {
                                                        $date_state = new \DateTime($visit->created);
                                                        $visit->formatted_created_state = $date_state->format('d-m-Y H:i:s');
                                                    }
                                                    else
                                                        $visit->formatted_created_state ='';

                                                    if($visit->state_end)
                                                    {
                                                      $end_date = new \DateTime($visit->state_end);
                                                      $visit->formatted_end_state = $end_date->format('d-m-Y H:i:s');
                                                    }
                                                    else
                                                        $visit->formatted_end_state = '';

                                                }
                                                
                                                foreach ($row->visit_intervention_doctors as $intervention) 
                                                {
                                                   $format_expec = new \DateTime($intervention->expected_meeting_date);
                                                   $intervention->expected_meeting_date = $format_expec->format('d-m-Y H:i:s');
                                                }
                                                return $row;
                                       });

    }

        public function findEntireByDate(Query $query, array $options)
    {
             return  $query->contain(['ManagerOperators.People','Patients.People','VisitStates'=>function($q){
                                                return $q->order(['VisitStates.created'=>'DESC']);
                                       },'VisitInterventionDoctors.VisitInvoices'])->order(['Visits.created'=>'DESC'])
                                        ->where(function($q) use($options){
                                                return $q->between('Visits.created',$options['date-from'], $options['date-to']);
                                        })->autoFields(true)->map(function($row){
                                                foreach ($row->visit_states as $visit) 
                                                {

                                                    if($visit->state_begin)
                                                    {
                                                        $date_state = new \DateTime($visit->created);
                                                        $visit->formatted_created_state = $date_state->format('d-m-Y H:i:s');
                                                    }
                                                    else
                                                        $visit->formatted_created_state ='';

                                                    if($visit->state_end)
                                                    {
                                                      $end_date = new \DateTime($visit->state_end);
                                                      $visit->formatted_end_state = $end_date->format('d-m-Y H:i:s');
                                                    }
                                                    else
                                                        $visit->formatted_end_state = '';

                                                }
                                                
                                                foreach ($row->visit_intervention_doctors as $intervention) 
                                                {
                                                   $format_expec = new \DateTime($intervention->expected_meeting_date);
                                                   $intervention->expected_meeting_date = $format_expec->format('d-m-Y H:i:s');
                                                }
                                                return $row;
                                       });

    }

    public function findInterventions(Query $query, array $options)
    {
        return $query->contain(['VisitInterventionDoctors.VisitInvoices','ManagerOperators.Institutions','VisitInterventionDoctors.Doctors.People','VisitInterventionDoctors.VisitActs','VisitInterventionAuxiliaries.Auxiliaries.People','VisitInterventionAuxiliaries.VisitActs'])->where(['Visits.id'=>$options['visit-id']])
                                                                    ->map(function($row){
                                                                        foreach ($row->visit_intervention_doctors as $doctor_intervention) {

                                                                            $created = new \DateTime($doctor_intervention->created);
                                                                            $doctor_intervention->formatted_created = $created->format('d-m-Y H:i:s');

                                                                            if($doctor_intervention->intervention_done)
                                                                                 {
                                                                                    $end = new \DateTime($doctor_intervention->intervention_done);
                                                                                    $doctor_intervention->formatted_done = $end->format('d-m-Y H:i:s');
                                                                                 }
                                                                                 else
                                                                                    $doctor_intervention->formatted_done = '';

                                                                                $doctor_intervention->category = 'medecin';
                                                                        

                                                                                if($doctor_intervention->visit_invoice)
                                                                                {
                                                                                    $countdown = 0;
                                                                                    $search = true;
                                                                                    while($search) 
                                                                                    {
                                                                                        if(file_exists(WWW_ROOT."Files/manager/".$row->manager_operator->institution->slug."/invoices_images/".$doctor_intervention->visit_invoice->code_invoice.'-'.$countdown.'.jpg'))
                                                                                        {
                                                                                            $countdown++;
                                                                                        }
                                                                                        else
                                                                                        {
                                                                                            $search = false;
                                                                                            $doctor_intervention->bill_image_count = $countdown;
                                                                                        }
                                                                                        
                                                                                    }
                                                                                }

                                                                            $doctor_intervention->slug = $row->manager_operator->institution->slug;
                                                                        }

                                                                        foreach ($row->visit_intervention_auxiliaries as $auxiliary_intervention) {
                                                                            $created = new \DatTime($auxiliary_intervention->created);
                                                                            $auxiliary_intervention->formatted_created = $created->format('d-m-Y H:i:s');
                                                                            if($auxiliary_intervention->intervention_done)
                                                                            {
                                                                                $end = new \DateTime($auxiliary_intervention->intervention_done);
                                                                                $auxiliary_intervention->formatted_done = $end->format('d-m-Y H:i:s');
                                                                            }
                                                                            else
                                                                                $auxiliary_intervention->formatted_done = '';

                                                                            $auxiliary_intervention->category='infirmier/auxiliaire';
                                                                        }

                                                                        return $row;
                                                                    });
    }
}
