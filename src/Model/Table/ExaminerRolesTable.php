<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ExaminerRoles Model
 *
 * @property \Cake\ORM\Association\HasMany $ExaminerRoleDetails
 *
 * @method \App\Model\Entity\ExaminerRole get($primaryKey, $options = [])
 * @method \App\Model\Entity\ExaminerRole newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ExaminerRole[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ExaminerRole|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ExaminerRole patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ExaminerRole[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ExaminerRole findOrCreate($search, callable $callback = null)
 */
class ExaminerRolesTable extends Table
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

        $this->table('examiner_roles');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->hasMany('ExaminerRoleDetails', [
            'foreignKey' => 'examiner_role_id'
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
