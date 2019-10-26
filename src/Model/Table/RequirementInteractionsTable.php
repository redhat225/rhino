<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RequirementInteractions Model
 *
 * @property \Cake\ORM\Association\BelongsTo $RequirementActiveIngredients
 * @property \Cake\ORM\Association\BelongsTo $InteractionFamily1s
 * @property \Cake\ORM\Association\BelongsTo $InteractionFamily2s
 *
 * @method \App\Model\Entity\RequirementInteraction get($primaryKey, $options = [])
 * @method \App\Model\Entity\RequirementInteraction newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RequirementInteraction[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RequirementInteraction|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RequirementInteraction patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RequirementInteraction[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RequirementInteraction findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RequirementInteractionsTable extends Table
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

        $this->table('requirement_interactions');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('RequirementActiveIngredients', [
            'foreignKey' => 'requirement_active_ingredient_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('InteractionFamily1s', [
            'foreignKey' => 'interaction_family_1_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('InteractionFamily2s', [
            'foreignKey' => 'interaction_family_2_id',
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
            ->requirePresence('interaction_family_name_1', 'create')
            ->notEmpty('interaction_family_name_1');

        $validator
            ->requirePresence('interaction_family_name_2', 'create')
            ->notEmpty('interaction_family_name_2');

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
        $rules->add($rules->existsIn(['requirement_active_ingredient_id'], 'RequirementActiveIngredients'));
        $rules->add($rules->existsIn(['interaction_family_1_id'], 'InteractionFamily1s'));
        $rules->add($rules->existsIn(['interaction_family_2_id'], 'InteractionFamily2s'));

        return $rules;
    }
}
