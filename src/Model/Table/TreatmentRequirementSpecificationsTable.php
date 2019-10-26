<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TreatmentRequirementSpecifications Model
 *
 * @property \Cake\ORM\Association\BelongsTo $TreatmentRequirements
 *
 * @method \App\Model\Entity\TreatmentRequirementSpecification get($primaryKey, $options = [])
 * @method \App\Model\Entity\TreatmentRequirementSpecification newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TreatmentRequirementSpecification[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TreatmentRequirementSpecification|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TreatmentRequirementSpecification patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TreatmentRequirementSpecification[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TreatmentRequirementSpecification findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TreatmentRequirementSpecificationsTable extends Table
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

        $this->table('treatment_requirement_specifications');
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
            ->requirePresence('specification_route', 'create')
            ->notEmpty('specification_route');

        $validator
            ->requirePresence('specification_dosage', 'create')
            ->notEmpty('specification_dosage');

        $validator
            ->requirePresence('specification_frequency', 'create')
            ->notEmpty('specification_frequency');

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
