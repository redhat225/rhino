<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VisitTasks Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Visits
 * @property \Cake\ORM\Association\BelongsTo $ManagerOperators
 * @property \Cake\ORM\Association\BelongsTo $Doctors
 * @property \Cake\ORM\Association\BelongsTo $Auxiliaries
 *
 * @method \App\Model\Entity\VisitTask get($primaryKey, $options = [])
 * @method \App\Model\Entity\VisitTask newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\VisitTask[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VisitTask|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VisitTask patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VisitTask[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\VisitTask findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class VisitTasksTable extends Table
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

        $this->table('visit_tasks');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Visits', [
            'foreignKey' => 'visit_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ManagerOperators', [
            'foreignKey' => 'manager_operator_id'
        ]);
        $this->belongsTo('Doctors', [
            'foreignKey' => 'doctor_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Auxiliaries', [
            'foreignKey' => 'auxiliary_id'
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
            ->requirePresence('content_task', 'create')
            ->notEmpty('content_task');

        return $validator;
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
        $rules->add($rules->existsIn(['manager_operator_id'], 'ManagerOperators'));
        $rules->add($rules->existsIn(['doctor_id'], 'Doctors'));
        $rules->add($rules->existsIn(['auxiliary_id'], 'Auxiliaries'));

        return $rules;
    }
}
