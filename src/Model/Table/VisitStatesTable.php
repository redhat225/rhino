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
 * VisitStates Model
 *
 * @property \Cake\ORM\Association\BelongsTo $VisitStateTypes
 * @property \Cake\ORM\Association\BelongsTo $Visits
 * @property \Cake\ORM\Association\BelongsTo $VisitLevels
 * @property \Cake\ORM\Association\BelongsTo $VisitKindTransports
 * @property \Cake\ORM\Association\HasMany $VisitStateOrderDetails
 *
 * @method \App\Model\Entity\VisitState get($primaryKey, $options = [])
 * @method \App\Model\Entity\VisitState newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\VisitState[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VisitState|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VisitState patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VisitState[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\VisitState findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class VisitStatesTable extends Table
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

        $this->table('visit_states');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('VisitStateTypes', [
            'foreignKey' => 'visit_state_type_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Visits', [
            'foreignKey' => 'visit_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('VisitLevels', [
            'foreignKey' => 'visit_level_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('VisitKindTransports', [
            'foreignKey' => 'visit_kind_transport_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('VisitStateOrderTypes', [
            'foreignKey' => 'visit_state_id',
            'targetForeignKey' => 'visit_state_order_type_id',
            'joinTable' => 'visit_state_order_details'
        ]);

        $this->hasMany('VisitStateOrderDetails',[
                    'foreignKey' => 'visit_state_id',
                    'joinType'=> 'INNER'
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
            ->dateTime('state_end')
            ->allowEmpty('state_end');

        $validator
            ->dateTime('state_begin')
            ->allowEmpty('state_begin');

        $validator
            ->boolean('visit_authorized')
            ->requirePresence('visit_authorized', 'create')
            ->notEmpty('visit_authorized');

        return $validator;
    }

    public function beforeMarshal(Event $event, arrayObject $data, ArrayObject $options)
    {

        if(isset($data['state-operation']))
        {
        //ended file and created file have different ways for instantiation
          switch ($data['state-operation']) 
          {
            case 'hospy_file':
                $additional_details = json_encode($data);

                $data['visit_state_order_types'] = [
                       [
                            'id'=> 1,
                            '_joinData' => [
                                'created_by' => $data['manager-id'],
                                'path_order_details' => md5(uniqid(true)),
                                'additional_details' => $additional_details
                            ]

                        ]
                    ];
                    $data['visit_authorized'] = 1;

                    $data['state_begin'] = new \DateTime('NOW');

            break;

            case 'emergency_enter_file':
                    $additional_details = json_encode($data);
                    $data['visit_state_order_types'] = [
                       [
                            'id'=> 2,
                            '_joinData' => [
                                'created_by' => $data['manager_operator_id'],
                                'path_order_details' => md5(uniqid(true)),
                                'additional_details' =>$additional_details
                            ]

                        ]
                    ];
            break;

            case 'meo_file':
                $additional_details = json_encode($data);

                $data['visit_state_order_types'] = [
                       [
                            'id'=> 9,
                            '_joinData' => [
                                'created_by' => $data['manager-id'],
                                'path_order_details' => md5(uniqid(true)),
                                'additional_details' => $additional_details
                            ]

                        ]
                    ];
                    $data['visit_authorized'] = 1;

                    $data['state_begin'] = new \DateTime('NOW');
            break;

            case 'surgery_file':
                $additional_details = json_encode($data);

                $data['visit_state_order_types'] = [
                       [
                            'id'=> 13,
                            '_joinData' => [
                                'created_by' => $data['manager-id'],
                                'path_order_details' => md5(uniqid(true)),
                                'additional_details' => $additional_details
                            ]

                        ]
                    ];
                    $data['visit_authorized'] = 1;

                    $data['state_begin'] = new \DateTime('NOW');
            break;

            case 'reanimation_file':
                $additional_details = json_encode($data);

                $data['visit_state_order_types'] = [
                       [
                            'id'=> 5,
                            '_joinData' => [
                                'created_by' => $data['manager-id'],
                                'path_order_details' => md5(uniqid(true)),
                                'additional_details' => $additional_details
                            ]

                        ]
                    ];
                    $data['visit_authorized'] = 1;

                    $data['state_begin'] = new \DateTime('NOW');
            break;

            case 'pregnancy_file':
                $additional_details = json_encode($data);

                $data['visit_state_order_types'] = [
                       [
                            'id'=> 7,
                            '_joinData' => [
                                'created_by' => $data['manager-id'],
                                'path_order_details' => md5(uniqid(true)),
                                'additional_details' => $additional_details
                            ]

                        ]
                    ];
                    $data['visit_authorized'] = 1;

                    $data['state_begin'] = new \DateTime('NOW');
            break;

            case 'trauma_file':
                $additional_details = json_encode($data);

                $data['visit_state_order_types'] = [
                       [
                            'id'=> 11,
                            '_joinData' => [
                                'created_by' => $data['manager-id'],
                                'path_order_details' => md5(uniqid(true)),
                                'additional_details' => $additional_details
                            ]

                        ]
                    ];
                    $data['visit_authorized'] = 1;

                    $data['state_begin'] = new \DateTime('NOW');
            break;

            





          }

        }

    }

    public function afterSave($event, $entity, $options)
    {
        if($entity->isNew())
        {
            switch ($entity->visit_state_type_id) 
            {
                case 2:
                    $schedule_title = 'Transfert Chirurgie';
                break;
                
                case 3:
                    $schedule_title = 'Transfert Hospitalisation';

                break;

                case 4:
                    $schedule_title = 'Transfert MEO';

                break;

                case 5:
                    $schedule_title = 'Transfert Réa';

                break;

                case 6:
                    $schedule_title = 'Transfert Maternité';

                break;


                case 9:
                    $schedule_title = 'Transfert Trauma';

                break;

                default:
                    $schedule_title = false;
                break;
            }

            if($schedule_title !== false)
            {
              $InstitutionSchedules = TableRegistry::get('InstitutionSchedules');
              $schedule = $InstitutionSchedules->newEntity();
              $schedule->schedule_title = $schedule_title;
              $schedule->schedule_start = $entity->state_begin;
              $schedule->institution_id = $entity->institution_id;
              $schedule->schedule_type = 'transfert';
              $schedule->repeated = 0;
              $schedule->editable = 0;

              $schedule_details = [
                'way'=>'enter',
                'patient' => $entity->patient_id,
                'state' => $entity->visit_state_type_id,
                'level' => $entity->visit_level_id,
                'transport' => $entity->visit_kind_transport_id,
                'visit'=>$entity->code_visit,
                'begin_state' => $entity->state_begin,
                'motif' => $entity->hospy_motif
              ];

              $schedule->schedule_details = json_encode($schedule_details);

              if(!$InstitutionSchedules->save($schedule))
                return false;
            }

        }
        else
        {
            if(!isset($entity->state_visit))
            {
                switch ($entity->visit_state_type_id) 
                {
                    case 2:
                        $schedule_title = 'Transfert Chirurgie';
                    break;
                    
                    case 3:
                        $schedule_title = 'Transfert Hospitalisation';

                    break;

                    case 4:
                        $schedule_title = 'Transfert MEO';

                    break;

                    case 5:
                        $schedule_title = 'Transfert Réa';

                    break;

                    case 6:
                        $schedule_title = 'Transfert Maternité';

                    break;

                    case 7:
                        $schedule_title = 'Transfert Urgences';
                    break;

                    case 9:
                        $schedule_title = 'Transfert Trauma';

                    break;

                    default:
                        $schedule_title = false;
                    break;
                }

                if($schedule_title !== false)
                {
                  $InstitutionSchedules = TableRegistry::get('InstitutionSchedules');
                  $schedule = $InstitutionSchedules->newEntity();
                  $schedule->schedule_title = $schedule_title;
                  $schedule->schedule_start = $entity->state_end;
                  $schedule->institution_id =  $entity->visit->manager_operator->institution_id;
                  $schedule->schedule_type = 'transfert';
                  $schedule->repeated = 0;
                  $schedule->editable = 0;

                  $schedule_details = [
                    'way'=>'exit',
                    'patient' => $entity->visit->patient_id,
                    'state' => $entity->visit_state_type_id,
                    'level' => $entity->visit_level_id,
                    'transport' => $entity->visit_kind_transport_id,
                    'visit'=>$entity->visit->code_visit,
                    'begin_state' => $entity->state_begin
                  ];

                  $schedule->schedule_details = json_encode($schedule_details);

                  if(!$InstitutionSchedules->save($schedule))
                    return false;
                }
            }

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
        $rules->add($rules->existsIn(['visit_state_type_id'], 'VisitStateTypes'));
        $rules->add($rules->existsIn(['visit_id'], 'Visits'));
        $rules->add($rules->existsIn(['visit_level_id'], 'VisitLevels'));
        $rules->add($rules->existsIn(['visit_kind_transport_id'], 'VisitKindTransports'));

        return $rules;
    }
}
