<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AuxiliaryRoleDetails Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Auxiliaries
 * @property \Cake\ORM\Association\BelongsTo $AuxiliaryRoles
 *
 * @method \App\Model\Entity\AuxiliaryRoleDetail get($primaryKey, $options = [])
 * @method \App\Model\Entity\AuxiliaryRoleDetail newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AuxiliaryRoleDetail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AuxiliaryRoleDetail|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AuxiliaryRoleDetail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AuxiliaryRoleDetail[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AuxiliaryRoleDetail findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AuxiliaryRoleDetailsTable extends Table
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

        $this->table('auxiliary_role_details');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Auxiliaries', [
            'foreignKey' => 'auxiliary_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('AuxiliaryRoles', [
            'foreignKey' => 'auxiliary_role_id',
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
        $rules->add($rules->existsIn(['auxiliary_id'], 'Auxiliaries'));
        $rules->add($rules->existsIn(['auxiliary_role_id'], 'AuxiliaryRoles'));

        return $rules;
    }
}
