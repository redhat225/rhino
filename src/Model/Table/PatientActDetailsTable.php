<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PatientActDetails Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Patients
 * @property \Cake\ORM\Association\BelongsTo $PatientActs
 *
 * @method \App\Model\Entity\PatientActDetail get($primaryKey, $options = [])
 * @method \App\Model\Entity\PatientActDetail newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PatientActDetail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PatientActDetail|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PatientActDetail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PatientActDetail[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PatientActDetail findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PatientActDetailsTable extends Table
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

        $this->table('patient_act_details');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Patients', [
            'foreignKey' => 'patient_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('PatientActs', [
            'foreignKey' => 'patient_act_id',
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
        $rules->add($rules->existsIn(['patient_act_id'], 'PatientActs'));

        return $rules;
    }
}
