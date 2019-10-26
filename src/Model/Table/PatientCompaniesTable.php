<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PatientCompanies Model
 *
 * @property \Cake\ORM\Association\HasMany $PatientCompanyDetails
 *
 * @method \App\Model\Entity\PatientCompany get($primaryKey, $options = [])
 * @method \App\Model\Entity\PatientCompany newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PatientCompany[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PatientCompany|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PatientCompany patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PatientCompany[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PatientCompany findOrCreate($search, callable $callback = null)
 */
class PatientCompaniesTable extends Table
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

        $this->table('patient_companies');
        $this->displayField('id');
        $this->primaryKey('id');
        
        $this->belongsToMany('Patients',[
                'foreignKey'=>'patient_company_id',
                'targetForeignKey'=>'patient_id',
                'joinTable'=>'patient_company_details'
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
            ->requirePresence('label_patient_company', 'create')
            ->notEmpty('label_patient_company');

        $validator
            ->requirePresence('contact1', 'create')
            ->notEmpty('contact1');

        $validator
            ->requirePresence('contact2', 'create')
            ->notEmpty('contact2');

        return $validator;
    }
}
