<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ExaminerOperatorActDetails Model
 *
 * @property \Cake\ORM\Association\BelongsTo $ExaminerOperatorActs
 * @property \Cake\ORM\Association\BelongsTo $ExaminerOperators
 *
 * @method \App\Model\Entity\ExaminerOperatorActDetail get($primaryKey, $options = [])
 * @method \App\Model\Entity\ExaminerOperatorActDetail newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ExaminerOperatorActDetail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ExaminerOperatorActDetail|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ExaminerOperatorActDetail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ExaminerOperatorActDetail[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ExaminerOperatorActDetail findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ExaminerOperatorActDetailsTable extends Table
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

        $this->table('examiner_operator_act_details');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('ExaminerOperatorActs', [
            'foreignKey' => 'examiner_operator_act_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ExaminerOperators', [
            'foreignKey' => 'examiner_operator_id',
            'joinType' => 'INNER'
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
        $rules->add($rules->existsIn(['examiner_operator_act_id'], 'ExaminerOperatorActs'));
        $rules->add($rules->existsIn(['examiner_operator_id'], 'ExaminerOperators'));

        return $rules;
    }
}
