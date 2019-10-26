<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TreatmentTypes Model
 *
 * @property \Cake\ORM\Association\HasMany $Treatments
 *
 * @method \App\Model\Entity\TreatmentType get($primaryKey, $options = [])
 * @method \App\Model\Entity\TreatmentType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TreatmentType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TreatmentType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TreatmentType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TreatmentType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TreatmentType findOrCreate($search, callable $callback = null)
 */
class TreatmentTypesTable extends Table
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

        $this->table('treatment_types');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->hasMany('Treatments', [
            'foreignKey' => 'treatment_type_id'
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

        return $validator;
    }
}
