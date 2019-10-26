<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VisitInvoicePaymentSchedules Model
 *
 * @property \Cake\ORM\Association\BelongsTo $VisitInvoicePayments
 *
 * @method \App\Model\Entity\VisitInvoicePaymentSchedule get($primaryKey, $options = [])
 * @method \App\Model\Entity\VisitInvoicePaymentSchedule newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\VisitInvoicePaymentSchedule[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VisitInvoicePaymentSchedule|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VisitInvoicePaymentSchedule patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VisitInvoicePaymentSchedule[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\VisitInvoicePaymentSchedule findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class VisitInvoicePaymentSchedulesTable extends Table
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

        $this->table('visit_invoice_payment_schedules');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('VisitInvoicePayments', [
            'foreignKey' => 'visit_invoice_payment_id',
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
            ->datetime('expected_date')
            ->requirePresence('expected_date', 'create')
            ->notEmpty('expected_date');

        $validator
            ->datetime('sold_date')
            ->allowEmpty('sold_date');

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
        $rules->add($rules->existsIn(['visit_invoice_payment_id'], 'VisitInvoicePayments'));

        return $rules;
    }
}
