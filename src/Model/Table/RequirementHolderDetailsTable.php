<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RequirementHolderDetails Model
 *
 * @property \Cake\ORM\Association\BelongsTo $RequirementHolders
 * @property \Cake\ORM\Association\BelongsTo $Requirements
 *
 * @method \App\Model\Entity\RequirementHolderDetail get($primaryKey, $options = [])
 * @method \App\Model\Entity\RequirementHolderDetail newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RequirementHolderDetail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RequirementHolderDetail|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RequirementHolderDetail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RequirementHolderDetail[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RequirementHolderDetail findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RequirementHolderDetailsTable extends Table
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

        $this->table('requirement_holder_details');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('RequirementHolders', [
            'foreignKey' => 'requirement_holder_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Requirements', [
            'foreignKey' => 'requirement_id',
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
        $rules->add($rules->existsIn(['requirement_holder_id'], 'RequirementHolders'));
        $rules->add($rules->existsIn(['requirement_id'], 'Requirements'));

        return $rules;
    }
}
