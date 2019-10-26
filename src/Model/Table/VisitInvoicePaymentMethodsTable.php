<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VisitInvoicePaymentMethods Model
 *
 * @property \Cake\ORM\Association\HasMany $VisitInvoicePayments
 *
 * @method \App\Model\Entity\VisitInvoicePaymentMethod get($primaryKey, $options = [])
 * @method \App\Model\Entity\VisitInvoicePaymentMethod newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\VisitInvoicePaymentMethod[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VisitInvoicePaymentMethod|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VisitInvoicePaymentMethod patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VisitInvoicePaymentMethod[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\VisitInvoicePaymentMethod findOrCreate($search, callable $callback = null)
 */
class VisitInvoicePaymentMethodsTable extends Table
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

        $this->table('visit_invoice_payment_methods');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->hasMany('VisitInvoicePayments', [
            'foreignKey' => 'visit_invoice_payment_method_id'
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
            ->requirePresence('label', 'create')
            ->notEmpty('label');

        return $validator;
    }
}
