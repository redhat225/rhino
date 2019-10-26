<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RequirementInfoGenerics Model
 *
 * @property \Cake\ORM\Association\BelongsTo $RequirementInfoGenericGroups
 *
 * @method \App\Model\Entity\RequirementInfoGeneric get($primaryKey, $options = [])
 * @method \App\Model\Entity\RequirementInfoGeneric newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RequirementInfoGeneric[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RequirementInfoGeneric|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RequirementInfoGeneric patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RequirementInfoGeneric[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RequirementInfoGeneric findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RequirementInfoGenericsTable extends Table
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

        $this->table('requirement_info_generics');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('RequirementInfoGenericGroups', [
            'foreignKey' => 'requirement_info_generic_group_id',
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
            ->requirePresence('generic_type', 'create')
            ->notEmpty('generic_type');

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
        $rules->add($rules->existsIn(['requirement_info_generic_group_id'], 'RequirementInfoGenericGroups'));

        return $rules;
    }
}
