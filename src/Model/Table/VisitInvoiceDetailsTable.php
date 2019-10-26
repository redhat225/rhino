<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VisitInvoiceDetails Model
 *
 * @property \Cake\ORM\Association\BelongsTo $VisitInvoices
 * @property \Cake\ORM\Association\BelongsTo $VisitInvoiceItems
 *
 * @method \App\Model\Entity\VisitInvoiceDetail get($primaryKey, $options = [])
 * @method \App\Model\Entity\VisitInvoiceDetail newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\VisitInvoiceDetail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VisitInvoiceDetail|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VisitInvoiceDetail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VisitInvoiceDetail[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\VisitInvoiceDetail findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class VisitInvoiceDetailsTable extends Table
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

        $this->table('visit_invoice_details');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('VisitInvoices', [
            'foreignKey' => 'visit_invoice_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('VisitInvoiceItems', [
            'foreignKey' => 'visit_invoice_item_id',
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
            ->integer('qty')
            ->requirePresence('qty', 'create')
            ->notEmpty('qty');

        $validator
            ->numeric('amount')
            ->requirePresence('amount', 'create')
            ->notEmpty('amount');

        $validator
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
        $rules->add($rules->existsIn(['visit_invoice_id'], 'VisitInvoices'));
        $rules->add($rules->existsIn(['visit_invoice_item_id'], 'VisitInvoiceItems'));

        return $rules;
    }
}
