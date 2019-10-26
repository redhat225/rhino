<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PharmacyInvoices Model
 *
 * @property \Cake\ORM\Association\BelongsTo $PharmacyOperators
 * @property \Cake\ORM\Association\BelongsTo $PharmacyCustomers
 * @property \Cake\ORM\Association\HasMany $PharmacyInvoiceDetails
 * @property \Cake\ORM\Association\HasMany $PharmacyPayments
 *
 * @method \App\Model\Entity\PharmacyInvoice get($primaryKey, $options = [])
 * @method \App\Model\Entity\PharmacyInvoice newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PharmacyInvoice[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PharmacyInvoice|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PharmacyInvoice patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PharmacyInvoice[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PharmacyInvoice findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PharmacyInvoicesTable extends Table
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

        $this->table('pharmacy_invoices');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('PharmacyOperators', [
            'foreignKey' => 'pharmacy_operator_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('PharmacyCustomers', [
            'foreignKey' => 'pharmacy_customer_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('PharmacyInvoiceDetails', [
            'foreignKey' => 'pharmacy_invoice_id'
        ]);
        $this->hasMany('PharmacyPayments', [
            'foreignKey' => 'pharmacy_invoice_id'
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
            ->date('details')
            ->allowEmpty('details');

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
        $rules->add($rules->existsIn(['pharmacy_operator_id'], 'PharmacyOperators'));
        $rules->add($rules->existsIn(['pharmacy_customer_id'], 'PharmacyCustomers'));

        return $rules;
    }
}
