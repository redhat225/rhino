<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TreatmentRequirementAlerts Model
 *
 * @property \Cake\ORM\Association\BelongsTo $TreatmentRequirements
 *
 * @method \App\Model\Entity\TreatmentRequirementAlert get($primaryKey, $options = [])
 * @method \App\Model\Entity\TreatmentRequirementAlert newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TreatmentRequirementAlert[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TreatmentRequirementAlert|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TreatmentRequirementAlert patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TreatmentRequirementAlert[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TreatmentRequirementAlert findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TreatmentRequirementAlertsTable extends Table
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

        $this->table('treatment_requirement_alerts');
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
            ->integer('alert_level')
            ->requirePresence('alert_level', 'create')
            ->notEmpty('alert_level');

        $validator
            ->requirePresence('alert_label', 'create')
            ->notEmpty('alert_label');

        $validator
            ->allowEmpty('alert_description');

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
