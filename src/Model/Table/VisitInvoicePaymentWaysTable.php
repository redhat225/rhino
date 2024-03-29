<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VisitInvoicePaymentWays Model
 *
 * @property \Cake\ORM\Association\HasMany $VisitInvoices
 *
 * @method \App\Model\Entity\VisitInvoicePaymentWay get($primaryKey, $options = [])
 * @method \App\Model\Entity\VisitInvoicePaymentWay newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\VisitInvoicePaymentWay[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VisitInvoicePaymentWay|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VisitInvoicePaymentWay patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VisitInvoicePaymentWay[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\VisitInvoicePaymentWay findOrCreate($search, callable $callback = null)
 */
class VisitInvoicePaymentWaysTable extends Table
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

        $this->table('visit_invoice_payment_ways');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->hasMany('VisitInvoices', [
            'foreignKey' => 'visit_invoice_payment_way_id'
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
            ->requirePresence('label_way', 'create')
            ->notEmpty('label_way');

        return $validator;
    }
}
