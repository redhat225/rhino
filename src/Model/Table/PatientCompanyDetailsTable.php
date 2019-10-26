<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PatientCompanyDetails Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Patients
 * @property \Cake\ORM\Association\BelongsTo $PatientCompanies
 *
 * @method \App\Model\Entity\PatientCompanyDetail get($primaryKey, $options = [])
 * @method \App\Model\Entity\PatientCompanyDetail newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PatientCompanyDetail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PatientCompanyDetail|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PatientCompanyDetail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PatientCompanyDetail[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PatientCompanyDetail findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PatientCompanyDetailsTable extends Table
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

        $this->table('patient_company_details');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Patients', [
            'foreignKey' => 'patient_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('PatientCompanies', [
            'foreignKey' => 'patient_company_id',
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
        $rules->add($rules->existsIn(['patient_id'], 'Patients'));
        $rules->add($rules->existsIn(['patient_company_id'], 'PatientCompanies'));

        return $rules;
    }
}
