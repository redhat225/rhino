<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ManagerOperatorActDetails Model
 *
 * @property \Cake\ORM\Association\BelongsTo $ManagerOperators
 * @property \Cake\ORM\Association\BelongsTo $ManagerOperatorActs
 *
 * @method \App\Model\Entity\ManagerOperatorActDetail get($primaryKey, $options = [])
 * @method \App\Model\Entity\ManagerOperatorActDetail newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ManagerOperatorActDetail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ManagerOperatorActDetail|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ManagerOperatorActDetail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ManagerOperatorActDetail[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ManagerOperatorActDetail findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ManagerOperatorActDetailsTable extends Table
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

        $this->table('manager_operator_act_details');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('ManagerOperators', [
            'foreignKey' => 'manager_operator_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ManagerOperatorActs', [
            'foreignKey' => 'manager_operator_act_id',
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
        $rules->add($rules->existsIn(['manager_operator_id'], 'ManagerOperators'));
        $rules->add($rules->existsIn(['manager_operator_act_id'], 'ManagerOperatorActs'));

        return $rules;
    }
}
