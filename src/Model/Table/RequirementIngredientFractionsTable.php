<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RequirementIngredientFractions Model
 *
 * @property \Cake\ORM\Association\BelongsTo $RequirementActiveFractions
 * @property \Cake\ORM\Association\BelongsTo $RequirementActiveIngredients
 * @property \Cake\ORM\Association\BelongsTo $RequirementCompositions
 *
 * @method \App\Model\Entity\RequirementIngredientFraction get($primaryKey, $options = [])
 * @method \App\Model\Entity\RequirementIngredientFraction newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RequirementIngredientFraction[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RequirementIngredientFraction|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RequirementIngredientFraction patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RequirementIngredientFraction[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RequirementIngredientFraction findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RequirementIngredientFractionsTable extends Table
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

        $this->table('requirement_ingredient_fractions');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('RequirementActiveFractions', [
            'foreignKey' => 'requirement_active_fraction_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('RequirementActiveIngredients', [
            'foreignKey' => 'requirement_active_ingredient_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('RequirementCompositions', [
            'foreignKey' => 'requirement_composition_id',
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
            ->integer('requirement_active_fraction_dosage')
            ->requirePresence('requirement_active_fraction_dosage', 'create')
            ->notEmpty('requirement_active_fraction_dosage');

        $validator
            ->requirePresence('requirement_active_fraction_dosage_unity', 'create')
            ->notEmpty('requirement_active_fraction_dosage_unity');

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
        $rules->add($rules->existsIn(['requirement_active_fraction_id'], 'RequirementActiveFractions'));
        $rules->add($rules->existsIn(['requirement_active_ingredient_id'], 'RequirementActiveIngredients'));
        $rules->add($rules->existsIn(['requirement_composition_id'], 'RequirementCompositions'));

        return $rules;
    }
}
