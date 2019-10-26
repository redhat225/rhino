<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Event\Event;
use ArrayObject;

/**
 * InstitutionSchedules Model
 *
 * @method \App\Model\Entity\InstitutionSchedule get($primaryKey, $options = [])
 * @method \App\Model\Entity\InstitutionSchedule newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\InstitutionSchedule[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\InstitutionSchedule|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\InstitutionSchedule patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\InstitutionSchedule[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\InstitutionSchedule findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class InstitutionSchedulesTable extends Table
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

        $this->table('institution_schedules');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Institutions', [
            'foreignKey' => 'institution_id',
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
            ->integer('editable')
            ->notEmpty('editable');

        $validator
            ->requirePresence('schedule_title', 'create')
            ->notEmpty('schedule_content');

        $validator
            ->requirePresence('schedule_type', 'create')
            ->notEmpty('schedule_type');

        $validator
            ->datetime('schedule_start')
            ->notEmpty('schedule_start');

        $validator
            ->datetime('schedule_end')
            ->allowEmpty('schedule_end');

        return $validator;
    }

    public function beforeMarshal(Event $event, ArrayObject $data, ArrayObject $options)
    {
        if(isset($data['state-operation']))
        {
             switch($data['state-operation'])
            {
                case 'add':
                            $data['schedule_start'] = $data['schedule_start_part1'].' '.$data['schedule_start_part2'].':00';
                            if($data['schedule_end_part1']!=="" && $data['schedule_end_part2']!=="")
                            $data['schedule_end'] = $data['schedule_end_part1'].' '.$data['schedule_end_part2'].':00';
                                $data['repeated'] = 0;

                            $data['schedule_type'] = 'programmation';
                            $data['editable'] = 1;

                break;
            }
        }

    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['institution_id'], 'Institutions'));
        return $rules;
    }
}
