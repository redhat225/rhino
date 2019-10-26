<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RequirementActiveIngredients Model
 *
 * @property \Cake\ORM\Association\HasMany $RequirementIngredientFractions
 * @property \Cake\ORM\Association\HasMany $RequirementInteractions
 * @property \Cake\ORM\Association\HasMany $RequirementLinkedActiveIngredients
 *
 * @method \App\Model\Entity\RequirementActiveIngredient get($primaryKey, $options = [])
 * @method \App\Model\Entity\RequirementActiveIngredient newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RequirementActiveIngredient[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RequirementActiveIngredient|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RequirementActiveIngredient patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RequirementActiveIngredient[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RequirementActiveIngredient findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RequirementActiveIngredientsTable extends Table
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

        $this->table('requirement_active_ingredients');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('RequirementIngredientFractions', [
            'foreignKey' => 'requirement_active_ingredient_id'
        ]);
        $this->hasMany('RequirementInteractions', [
            'foreignKey' => 'requirement_active_ingredient_id'
        ]);
        $this->hasMany('RequirementLinkedActiveIngredients', [
            'foreignKey' => 'requirement_active_ingredient_id'
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
            ->requirePresence('ingredient_label', 'create')
            ->notEmpty('ingredient_label');

        return $validator;
    }
}
