<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PatientAntecedentItems Model
 *
 * @property \Cake\ORM\Association\BelongsTo $PatientAntecedentUnderTypes
 * @property \Cake\ORM\Association\HasMany $PatientAntecedents
 *
 * @method \App\Model\Entity\PatientAntecedentItem get($primaryKey, $options = [])
 * @method \App\Model\Entity\PatientAntecedentItem newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PatientAntecedentItem[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PatientAntecedentItem|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PatientAntecedentItem patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PatientAntecedentItem[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PatientAntecedentItem findOrCreate($search, callable $callback = null)
 */
class PatientAntecedentItemsTable extends Table
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

        $this->table('patient_antecedent_items');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('PatientAntecedentUnderTypes', [
            'foreignKey' => 'patient_antecedent_under_type_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('PatientAntecedents', [
            'foreignKey' => 'patient_antecedent_item_id'
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
            ->requirePresence('label_item', 'create')
            ->notEmpty('label_item');

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
        $rules->add($rules->existsIn(['patient_antecedent_under_type_id'], 'PatientAntecedentUnderTypes'));

        return $rules;
    }
}
