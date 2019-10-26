<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PharmacyPayments Model
 *
 * @property \Cake\ORM\Association\BelongsTo $PharmacyPaymentMethods
 * @property \Cake\ORM\Association\BelongsTo $PharmacyInvoices
 *
 * @method \App\Model\Entity\PharmacyPayment get($primaryKey, $options = [])
 * @method \App\Model\Entity\PharmacyPayment newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PharmacyPayment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PharmacyPayment|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PharmacyPayment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PharmacyPayment[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PharmacyPayment findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PharmacyPaymentsTable extends Table
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

        $this->table('pharmacy_payments');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('PharmacyPaymentMethods', [
            'foreignKey' => 'pharmacy_payment_method_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('PharmacyInvoices', [
            'foreignKey' => 'pharmacy_invoice_id',
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

        $validator
            ->requirePresence('code', 'create')
            ->notEmpty('code');

        $validator
            ->decimal('amount')
            ->requirePresence('amount', 'create')
            ->notEmpty('amount');

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
        $rules->add($rules->existsIn(['pharmacy_payment_method_id'], 'PharmacyPaymentMethods'));
        $rules->add($rules->existsIn(['pharmacy_invoice_id'], 'PharmacyInvoices'));

        return $rules;
    }
}
