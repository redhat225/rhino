<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ManagerOperatorActs Model
 *
 * @property \Cake\ORM\Association\HasMany $ManagerOperatorActDetails
 *
 * @method \App\Model\Entity\ManagerOperatorAct get($primaryKey, $options = [])
 * @method \App\Model\Entity\ManagerOperatorAct newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ManagerOperatorAct[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ManagerOperatorAct|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ManagerOperatorAct patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ManagerOperatorAct[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ManagerOperatorAct findOrCreate($search, callable $callback = null)
 */
class ManagerOperatorActsTable extends Table
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

        $this->table('manager_operator_acts');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->hasMany('ManagerOperatorActDetails', [
            'foreignKey' => 'manager_operator_act_id'
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
            ->requirePresence('label_manager_op_act', 'create')
            ->notEmpty('label_manager_op_act');

        return $validator;
    }
}
