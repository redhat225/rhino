<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PatientAntecedentTypes Model
 *
 * @property \Cake\ORM\Association\HasMany $PatientAntecedentUnderTypes
 *
 * @method \App\Model\Entity\PatientAntecedentType get($primaryKey, $options = [])
 * @method \App\Model\Entity\PatientAntecedentType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PatientAntecedentType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PatientAntecedentType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PatientAntecedentType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PatientAntecedentType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PatientAntecedentType findOrCreate($search, callable $callback = null)
 */
class PatientAntecedentTypesTable extends Table
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

        $this->table('patient_antecedent_types');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->hasMany('PatientAntecedentUnderTypes', [
            'foreignKey' => 'patient_antecedent_type_id'
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
            ->requirePresence('label_antecedent_type', 'create')
            ->notEmpty('label_antecedent_type');

        return $validator;
    }
}
