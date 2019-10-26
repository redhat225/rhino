<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VisitInvoiceItems Model
 *
 * @property \Cake\ORM\Association\BelongsTo $VisitInvoiceItemCategories
 * @property \Cake\ORM\Association\BelongsTo $Institutions
 * @property \Cake\ORM\Association\HasMany $VisitInvoiceDetails
 *
 * @method \App\Model\Entity\VisitInvoiceItem get($primaryKey, $options = [])
 * @method \App\Model\Entity\VisitInvoiceItem newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\VisitInvoiceItem[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VisitInvoiceItem|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VisitInvoiceItem patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VisitInvoiceItem[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\VisitInvoiceItem findOrCreate($search, callable $callback = null)
 */
class VisitInvoiceItemsTable extends Table
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

        $this->table('visit_invoice_items');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('VisitInvoiceItemCategories', [
            'foreignKey' => 'visit_invoice_item_category_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Institutions', [
            'foreignKey' => 'institution_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('VisitInvoiceDetails', [
            'foreignKey' => 'visit_invoice_item_id'
        ]);

        $this->belongsToMany('VisitInvoices',[
                    'foreignKey' => 'visit_invoice_item_id',
                    'targetForeignKey' => 'visit_invoice_id',
                    'joinTable' => 'visit_invoice_details'
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
            ->requirePresence('label_item', 'create')
            ->notEmpty('label_item');

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
        $rules->add($rules->existsIn(['visit_invoice_item_category_id'], 'VisitInvoiceItemCategories'));
        $rules->add($rules->existsIn(['institution_id'], 'Institutions'));

        return $rules;
    }
}
