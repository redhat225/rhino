<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PatientAntecedentUnderTypes Model
 *
 * @property \Cake\ORM\Association\BelongsTo $PatientAntecedentTypes
 * @property \Cake\ORM\Association\HasMany $PatientAntecedentItems
 *
 * @method \App\Model\Entity\PatientAntecedentUnderType get($primaryKey, $options = [])
 * @method \App\Model\Entity\PatientAntecedentUnderType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PatientAntecedentUnderType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PatientAntecedentUnderType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PatientAntecedentUnderType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PatientAntecedentUnderType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PatientAntecedentUnderType findOrCreate($search, callable $callback = null)
 */
class PatientAntecedentUnderTypesTable extends Table
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

        $this->table('patient_antecedent_under_types');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('PatientAntecedentTypes', [
            'foreignKey' => 'patient_antecedent_type_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('PatientAntecedentItems', [
            'foreignKey' => 'patient_antecedent_under_type_id'
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
            ->requirePresence('label_under_type', 'create')
            ->notEmpty('label_under_type');

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
        $rules->add($rules->existsIn(['patient_antecedent_type_id'], 'PatientAntecedentTypes'));

        return $rules;
    }
}
