<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VisitInvoiceItemCategories Model
 *
 * @property \Cake\ORM\Association\HasMany $VisitInvoiceItems
 *
 * @method \App\Model\Entity\VisitInvoiceItemCategory get($primaryKey, $options = [])
 * @method \App\Model\Entity\VisitInvoiceItemCategory newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\VisitInvoiceItemCategory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VisitInvoiceItemCategory|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VisitInvoiceItemCategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VisitInvoiceItemCategory[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\VisitInvoiceItemCategory findOrCreate($search, callable $callback = null)
 */
class VisitInvoiceItemCategoriesTable extends Table
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

        $this->table('visit_invoice_item_categories');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->hasMany('VisitInvoiceItems', [
            'foreignKey' => 'visit_invoice_item_category_id'
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
            ->requirePresence('label_item_category', 'create')
            ->notEmpty('label_item_category');

        return $validator;
    }
}
