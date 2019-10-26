<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PatientAntecedents Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Patients
 * @property \Cake\ORM\Association\BelongsTo $PatientAntecedentItems
 *
 * @method \App\Model\Entity\PatientAntecedent get($primaryKey, $options = [])
 * @method \App\Model\Entity\PatientAntecedent newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PatientAntecedent[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PatientAntecedent|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PatientAntecedent patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PatientAntecedent[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PatientAntecedent findOrCreate($search, callable $callback = null)
 */
class PatientAntecedentsTable extends Table
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

        $this->table('patient_antecedents');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Patients', [
            'foreignKey' => 'patient_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('PatientAntecedentItems', [
            'foreignKey' => 'patient_antecedent_item_id',
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
            ->requirePresence('scope_antecedent', 'create')
            ->notEmpty('scope_antecedent');

        $validator
            ->integer('intensity')
            ->requirePresence('intensity', 'create')
            ->notEmpty('intensity');

        $validator
            ->allowEmpty('antecedent_note');

        $validator
            ->date('begin')
            ->requirePresence('begin', 'create')
            ->notEmpty('begin');

        $validator
            ->date('end')
            ->allowEmpty('end');

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
        $rules->add($rules->existsIn(['patient_antecedent_item_id'], 'PatientAntecedentItems'));

        return $rules;
    }
}
