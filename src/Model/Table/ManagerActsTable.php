<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ManagerActs Model
 *
 * @method \App\Model\Entity\ManagerAct get($primaryKey, $options = [])
 * @method \App\Model\Entity\ManagerAct newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ManagerAct[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ManagerAct|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ManagerAct patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ManagerAct[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ManagerAct findOrCreate($search, callable $callback = null)
 */
class ManagerActsTable extends Table
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

        $this->table('manager_acts');
        $this->displayField('id');
        $this->primaryKey('id');
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
            ->requirePresence('label_manager_act', 'create')
            ->notEmpty('label_manager_act');

        return $validator;
    }
}
