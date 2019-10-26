<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PharmacyOperatorActs Model
 *
 * @property \Cake\ORM\Association\HasMany $PharmacyOperatorActDetails
 *
 * @method \App\Model\Entity\PharmacyOperatorAct get($primaryKey, $options = [])
 * @method \App\Model\Entity\PharmacyOperatorAct newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PharmacyOperatorAct[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PharmacyOperatorAct|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PharmacyOperatorAct patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PharmacyOperatorAct[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PharmacyOperatorAct findOrCreate($search, callable $callback = null)
 */
class PharmacyOperatorActsTable extends Table
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

        $this->table('pharmacy_operator_acts');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->hasMany('PharmacyOperatorActDetails', [
            'foreignKey' => 'pharmacy_operator_act_id'
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
            ->requirePresence('label_pharmacy_op_act', 'create')
            ->notEmpty('label_pharmacy_op_act');

        return $validator;
    }
}
