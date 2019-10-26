<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RequirementInfoGenericGroups Model
 *
 * @property \Cake\ORM\Association\HasMany $RequirementInfoGenerics
 *
 * @method \App\Model\Entity\RequirementInfoGenericGroup get($primaryKey, $options = [])
 * @method \App\Model\Entity\RequirementInfoGenericGroup newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RequirementInfoGenericGroup[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RequirementInfoGenericGroup|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RequirementInfoGenericGroup patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RequirementInfoGenericGroup[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RequirementInfoGenericGroup findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RequirementInfoGenericGroupsTable extends Table
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

        $this->table('requirement_info_generic_groups');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('RequirementInfoGenerics', [
            'foreignKey' => 'requirement_info_generic_group_id'
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
            ->requirePresence('group_label', 'create')
            ->notEmpty('group_label');

        $validator
            ->requirePresence('group_code', 'create')
            ->notEmpty('group_code');

        return $validator;
    }
}
