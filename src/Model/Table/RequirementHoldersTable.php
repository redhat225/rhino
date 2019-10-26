<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RequirementHolders Model
 *
 * @property \Cake\ORM\Association\BelongsTo $CountryTownships
 * @property \Cake\ORM\Association\HasMany $RequirementHolderDetails
 *
 * @method \App\Model\Entity\RequirementHolder get($primaryKey, $options = [])
 * @method \App\Model\Entity\RequirementHolder newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RequirementHolder[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RequirementHolder|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RequirementHolder patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RequirementHolder[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RequirementHolder findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RequirementHoldersTable extends Table
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

        $this->table('requirement_holders');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('CountryTownships', [
            'foreignKey' => 'country_township_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('RequirementHolderDetails', [
            'foreignKey' => 'requirement_holder_id'
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
            ->requirePresence('holder_name', 'create')
            ->notEmpty('holder_name');

        $validator
            ->requirePresence('holder_adress', 'create')
            ->notEmpty('holder_adress');

        $validator
            ->requirePresence('holder_contact', 'create')
            ->notEmpty('holder_contact');

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
        $rules->add($rules->existsIn(['country_township_id'], 'CountryTownships'));

        return $rules;
    }
}
