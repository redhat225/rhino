<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RequirementCompositions Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Requirements
 * @property \Cake\ORM\Association\HasMany $RequirementIngredientFractions
 * @property \Cake\ORM\Association\HasMany $RequirementLinkedActiveIngredients
 *
 * @method \App\Model\Entity\RequirementComposition get($primaryKey, $options = [])
 * @method \App\Model\Entity\RequirementComposition newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RequirementComposition[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RequirementComposition|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RequirementComposition patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RequirementComposition[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RequirementComposition findOrCreate($search, callable $callback = null)
 */
class RequirementCompositionsTable extends Table
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

        $this->table('requirement_compositions');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Requirements', [
            'foreignKey' => 'requirement_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('RequirementIngredientFractions', [
            'foreignKey' => 'requirement_composition_id'
        ]);
        $this->hasMany('RequirementLinkedActiveIngredients', [
            'foreignKey' => 'requirement_composition_id'
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
            ->requirePresence('composition_dosage_reference', 'create')
            ->notEmpty('composition_dosage_reference');

        $validator
            ->requirePresence('composition_pharma_designation', 'create')
            ->notEmpty('composition_pharma_designation');

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
        $rules->add($rules->existsIn(['requirement_id'], 'Requirements'));

        return $rules;
    }
}
