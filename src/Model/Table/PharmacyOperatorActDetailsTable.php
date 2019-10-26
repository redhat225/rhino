<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PharmacyOperatorActDetails Model
 *
 * @property \Cake\ORM\Association\BelongsTo $PharmacyOperatorActs
 * @property \Cake\ORM\Association\BelongsTo $PharmacyOperators
 *
 * @method \App\Model\Entity\PharmacyOperatorActDetail get($primaryKey, $options = [])
 * @method \App\Model\Entity\PharmacyOperatorActDetail newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PharmacyOperatorActDetail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PharmacyOperatorActDetail|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PharmacyOperatorActDetail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PharmacyOperatorActDetail[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PharmacyOperatorActDetail findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PharmacyOperatorActDetailsTable extends Table
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

        $this->table('pharmacy_operator_act_details');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('PharmacyOperatorActs', [
            'foreignKey' => 'pharmacy_operator_act_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('PharmacyOperators', [
            'foreignKey' => 'pharmacy_operator_id',
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
        $rules->add($rules->existsIn(['pharmacy_operator_act_id'], 'PharmacyOperatorActs'));
        $rules->add($rules->existsIn(['pharmacy_operator_id'], 'PharmacyOperators'));

        return $rules;
    }
}
