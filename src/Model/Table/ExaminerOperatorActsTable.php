<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ExaminerOperatorActs Model
 *
 * @property \Cake\ORM\Association\HasMany $ExaminerOperatorActDetails
 *
 * @method \App\Model\Entity\ExaminerOperatorAct get($primaryKey, $options = [])
 * @method \App\Model\Entity\ExaminerOperatorAct newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ExaminerOperatorAct[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ExaminerOperatorAct|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ExaminerOperatorAct patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ExaminerOperatorAct[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ExaminerOperatorAct findOrCreate($search, callable $callback = null)
 */
class ExaminerOperatorActsTable extends Table
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

        $this->table('examiner_operator_acts');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->hasMany('ExaminerOperatorActDetails', [
            'foreignKey' => 'examiner_operator_act_id'
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
            ->requirePresence('label_examiner_op_act', 'create')
            ->notEmpty('label_examiner_op_act');

        return $validator;
    }
}
