<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VisitStateOrderTypes Model
 *
 * @property \Cake\ORM\Association\HasMany $VisitStateOrderDetails
 *
 * @method \App\Model\Entity\VisitStateOrderType get($primaryKey, $options = [])
 * @method \App\Model\Entity\VisitStateOrderType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\VisitStateOrderType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VisitStateOrderType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VisitStateOrderType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VisitStateOrderType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\VisitStateOrderType findOrCreate($search, callable $callback = null)
 */
class VisitStateOrderTypesTable extends Table
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

        $this->table('visit_state_order_types');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsToMany('VisitStates', [
            'foreignKey' => 'visit_state_order_type_id',
            'targetForeignKey' => 'visit_state_id',
            'joinTable' => 'visit_state_order_details'
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
            ->requirePresence('label_order_type','create')
            ->notEmpty('label_order_type');

        return $validator;
    }
}
