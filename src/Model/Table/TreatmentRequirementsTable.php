<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TreatmentRequirements Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Requirements
 * @property \Cake\ORM\Association\BelongsTo $Treatments
 * @property \Cake\ORM\Association\HasMany $TreatmentRequirementAlerts
 * @property \Cake\ORM\Association\HasMany $TreatmentRequirementRenewals
 * @property \Cake\ORM\Association\HasMany $TreatmentRequirementSpecifications
 *
 * @method \App\Model\Entity\TreatmentRequirement get($primaryKey, $options = [])
 * @method \App\Model\Entity\TreatmentRequirement newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TreatmentRequirement[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TreatmentRequirement|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TreatmentRequirement patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TreatmentRequirement[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TreatmentRequirement findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TreatmentRequirementsTable extends Table
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

        $this->table('treatment_requirements');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Requirements', [
            'foreignKey' => 'requirement_id'
        ]);
        $this->belongsTo('Treatments', [
            'foreignKey' => 'treatment_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('TreatmentRequirementAlerts', [
            'foreignKey' => 'treatment_requirement_id'
        ]);
        $this->hasMany('TreatmentRequirementRenewals', [
            'foreignKey' => 'treatment_requirement_id'
        ]);
        $this->hasMany('TreatmentRequirementSpecifications', [
            'foreignKey' => 'treatment_requirement_id'
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
            ->requirePresence('label_requirement', 'create')
            ->notEmpty('label_requirement');

        $validator
            ->allowEmpty('requirement_cis_code');

        $validator
            ->integer('requirement_duration')
            ->requirePresence('requirement_duration', 'create')
            ->notEmpty('requirement_duration');

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
        $rules->add($rules->existsIn(['requirement_id'], 'Requirements'));
        $rules->add($rules->existsIn(['treatment_id'], 'Treatments'));

        return $rules;
    }
}
