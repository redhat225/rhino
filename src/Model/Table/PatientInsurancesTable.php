<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PatientInsurances Model
 *
 * @property \Cake\ORM\Association\BelongsTo $PatientInsurers
 * @property \Cake\ORM\Association\BelongsTo $Patients
 *
 * @method \App\Model\Entity\PatientInsurance get($primaryKey, $options = [])
 * @method \App\Model\Entity\PatientInsurance newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PatientInsurance[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PatientInsurance|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PatientInsurance patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PatientInsurance[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PatientInsurance findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PatientInsurancesTable extends Table
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

        $this->table('patient_insurances');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('PatientInsurers', [
            'foreignKey' => 'patient_insurer_id',
            'joinType' => 'INNER'
        ]);

        $this->belongsTo('Institutions', [
            'foreignKey' => 'institution_id',
            'joinType' => 'INNER'
        ]);

        $this->belongsTo('Patients', [
            'foreignKey' => 'patient_id',
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
            ->requirePresence('number_card', 'create')
            ->notEmpty('number_card');

        $validator
            ->dateTime('deleted')
            ->allowEmpty('deleted');

        $validator
            ->date('expired_insurance_date')
            ->requirePresence('expired_insurance_date', 'create')
            ->notEmpty('expired_insurance_date');

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
        $rules->add($rules->existsIn(['patient_insurer_id'], 'PatientInsurers'));
        $rules->add($rules->isUnique(['number_card']));
        $rules->add($rules->existsIn(['patient_id'], 'Patients'));
        $rules->add($rules->existsIn(['institution_id'], 'Institutions'));

        return $rules;
    }
}
