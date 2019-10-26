<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PatientActs Model
 *
 * @property \Cake\ORM\Association\HasMany $PatientActDetails
 *
 * @method \App\Model\Entity\PatientAct get($primaryKey, $options = [])
 * @method \App\Model\Entity\PatientAct newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PatientAct[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PatientAct|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PatientAct patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PatientAct[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PatientAct findOrCreate($search, callable $callback = null)
 */
class PatientActsTable extends Table
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

        $this->table('patient_acts');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->hasMany('PatientActDetails', [
            'foreignKey' => 'patient_act_id'
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
            ->requirePresence('label_patient_act', 'create')
            ->notEmpty('label_patient_act');

        return $validator;
    }
}
