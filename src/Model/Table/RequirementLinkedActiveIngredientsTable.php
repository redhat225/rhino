<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RequirementLinkedActiveIngredients Model
 *
 * @property \Cake\ORM\Association\BelongsTo $RequirementCompositions
 * @property \Cake\ORM\Association\BelongsTo $RequirementActiveIngredients
 *
 * @method \App\Model\Entity\RequirementLinkedActiveIngredient get($primaryKey, $options = [])
 * @method \App\Model\Entity\RequirementLinkedActiveIngredient newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RequirementLinkedActiveIngredient[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RequirementLinkedActiveIngredient|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RequirementLinkedActiveIngredient patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RequirementLinkedActiveIngredient[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RequirementLinkedActiveIngredient findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RequirementLinkedActiveIngredientsTable extends Table
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

        $this->table('requirement_linked_active_ingredients');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('RequirementCompositions', [
            'foreignKey' => 'requirement_composition_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('RequirementActiveIngredients', [
            'foreignKey' => 'requirement_active_ingredient_id',
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
            ->integer('active_dosage')
            ->requirePresence('active_dosage', 'create')
            ->notEmpty('active_dosage');

        $validator
            ->requirePresence('active_dosage_unity', 'create')
            ->notEmpty('active_dosage_unity');

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
        $rules->add($rules->existsIn(['requirement_composition_id'], 'RequirementCompositions'));
        $rules->add($rules->existsIn(['requirement_active_ingredient_id'], 'RequirementActiveIngredients'));

        return $rules;
    }
}
