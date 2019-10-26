<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TreatmentRequirementRenewals Model
 *
 * @property \Cake\ORM\Association\BelongsTo $TreatmentRequirements
 *
 * @method \App\Model\Entity\TreatmentRequirementRenewal get($primaryKey, $options = [])
 * @method \App\Model\Entity\TreatmentRequirementRenewal newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TreatmentRequirementRenewal[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TreatmentRequirementRenewal|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TreatmentRequirementRenewal patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TreatmentRequirementRenewal[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TreatmentRequirementRenewal findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TreatmentRequirementRenewalsTable extends Table
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

        $this->table('treatment_requirement_renewals');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('TreatmentRequirements', [
            'foreignKey' => 'treatment_requirement_id',
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

        $validator
            ->integer('renewal_duration')
            ->requirePresence('renewal_duration', 'create')
            ->notEmpty('renewal_duration');

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
        $rules->add($rules->existsIn(['treatment_requirement_id'], 'TreatmentRequirements'));

        return $rules;
    }
}
