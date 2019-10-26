<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PharmacyRoles Model
 *
 * @property \Cake\ORM\Association\HasMany $PharmacyOperators
 *
 * @method \App\Model\Entity\PharmacyRole get($primaryKey, $options = [])
 * @method \App\Model\Entity\PharmacyRole newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PharmacyRole[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PharmacyRole|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PharmacyRole patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PharmacyRole[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PharmacyRole findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PharmacyRolesTable extends Table
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

        $this->table('pharmacy_roles');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('PharmacyOperators', [
            'foreignKey' => 'pharmacy_role_id'
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        return $validator;
    }
}
