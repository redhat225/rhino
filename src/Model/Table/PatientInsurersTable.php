<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PatientInsurers Model
 *
 * @property \Cake\ORM\Association\HasMany $PatientInsurances
 *
 * @method \App\Model\Entity\PatientInsurer get($primaryKey, $options = [])
 * @method \App\Model\Entity\PatientInsurer newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PatientInsurer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PatientInsurer|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PatientInsurer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PatientInsurer[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PatientInsurer findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PatientInsurersTable extends Table
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

        $this->table('patient_insurers');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('PatientInsurances', [
            'foreignKey' => 'patient_insurer_id'
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
            ->requirePresence('label', 'create')
            ->notEmpty('label');

        $validator
            ->requirePresence('logo_insurance', 'create')
            ->notEmpty('logo_insurance');

        return $validator;
    }
}
