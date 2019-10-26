<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RequirementActiveFractions Model
 *
 * @property \Cake\ORM\Association\HasMany $RequirementIngredientFractions
 *
 * @method \App\Model\Entity\RequirementActiveFraction get($primaryKey, $options = [])
 * @method \App\Model\Entity\RequirementActiveFraction newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RequirementActiveFraction[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RequirementActiveFraction|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RequirementActiveFraction patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RequirementActiveFraction[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RequirementActiveFraction findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RequirementActiveFractionsTable extends Table
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

        $this->table('requirement_active_fractions');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('RequirementIngredientFractions', [
            'foreignKey' => 'requirement_active_fraction_id'
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
            ->requirePresence('fraction_label', 'create')
            ->notEmpty('fraction_label');

        return $validator;
    }
}
