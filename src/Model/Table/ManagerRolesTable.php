<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ManagerRoles Model
 *
 * @property \Cake\ORM\Association\HasMany $ManagerRoleDetails
 *
 * @method \App\Model\Entity\ManagerRole get($primaryKey, $options = [])
 * @method \App\Model\Entity\ManagerRole newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ManagerRole[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ManagerRole|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ManagerRole patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ManagerRole[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ManagerRole findOrCreate($search, callable $callback = null)
 */
class ManagerRolesTable extends Table
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

        $this->table('manager_roles');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->hasMany('ManagerRoleDetails', [
            'foreignKey' => 'manager_role_id'
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
