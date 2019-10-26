<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ExaminerOperators Model
 *
 * @property \Cake\ORM\Association\BelongsTo $People
 * @property \Cake\ORM\Association\BelongsTo $ExaminerInstitutions
 * @property \Cake\ORM\Association\HasMany $ExaminerOperatorActDetails
 * @property \Cake\ORM\Association\HasMany $ExaminerRoleDetails
 *
 * @method \App\Model\Entity\ExaminerOperator get($primaryKey, $options = [])
 * @method \App\Model\Entity\ExaminerOperator newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ExaminerOperator[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ExaminerOperator|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ExaminerOperator patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ExaminerOperator[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ExaminerOperator findOrCreate($search, callable $callback = null)
 */
class ExaminerOperatorsTable extends Table
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

        $this->table('examiner_operators');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('People', [
            'foreignKey' => 'people_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ExaminerInstitutions', [
            'foreignKey' => 'examiner_institution_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('ExaminerOperatorActDetails', [
            'foreignKey' => 'examiner_operator_id'
        ]);
        $this->hasMany('ExaminerRoleDetails', [
            'foreignKey' => 'examiner_operator_id'
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
            ->requirePresence('code', 'create')
            ->notEmpty('code');

        $validator
            ->requirePresence('username', 'create')
            ->notEmpty('username');

        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->allowEmpty('avatar_examiner');

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
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['people_id'], 'People'));
        $rules->add($rules->existsIn(['examiner_institution_id'], 'ExaminerInstitutions'));

        return $rules;
    }
}
