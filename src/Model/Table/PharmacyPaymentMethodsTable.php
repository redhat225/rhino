<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PharmacyPaymentMethods Model
 *
 * @property \Cake\ORM\Association\HasMany $PharmacyPayments
 *
 * @method \App\Model\Entity\PharmacyPaymentMethod get($primaryKey, $options = [])
 * @method \App\Model\Entity\PharmacyPaymentMethod newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PharmacyPaymentMethod[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PharmacyPaymentMethod|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PharmacyPaymentMethod patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PharmacyPaymentMethod[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PharmacyPaymentMethod findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PharmacyPaymentMethodsTable extends Table
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

        $this->table('pharmacy_payment_methods');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('PharmacyPayments', [
            'foreignKey' => 'pharmacy_payment_method_id'
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
