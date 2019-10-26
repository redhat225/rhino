<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AuxiliaryRoles Model
 *
 * @property \Cake\ORM\Association\HasMany $AuxiliaryRoleDetails
 *
 * @method \App\Model\Entity\AuxiliaryRole get($primaryKey, $options = [])
 * @method \App\Model\Entity\AuxiliaryRole newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AuxiliaryRole[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AuxiliaryRole|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AuxiliaryRole patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AuxiliaryRole[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AuxiliaryRole findOrCreate($search, callable $callback = null)
 */
class AuxiliaryRolesTable extends Table
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

        $this->table('auxiliary_roles');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->hasMany('AuxiliaryRoleDetails', [
            'foreignKey' => 'auxiliary_role_id'
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
            ->requirePresence('label_role', 'create')
            ->notEmpty('label_role');

        return $validator;
    }
}
