<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PharmacyStoreProducts Model
 *
 * @property \Cake\ORM\Association\BelongsTo $PharmacyProducts
 * @property \Cake\ORM\Association\HasMany $PharmacyInvoiceDetails
 * @property \Cake\ORM\Association\HasMany $PharmacyStoreProductLevels
 *
 * @method \App\Model\Entity\PharmacyStoreProduct get($primaryKey, $options = [])
 * @method \App\Model\Entity\PharmacyStoreProduct newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PharmacyStoreProduct[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PharmacyStoreProduct|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PharmacyStoreProduct patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PharmacyStoreProduct[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PharmacyStoreProduct findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PharmacyStoreProductsTable extends Table
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

        $this->table('pharmacy_store_products');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('PharmacyProducts', [
            'foreignKey' => 'pharmacy_product_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('PharmacyInvoiceDetails', [
            'foreignKey' => 'pharmacy_store_product_id'
        ]);
        $this->hasMany('PharmacyStoreProductLevels', [
            'foreignKey' => 'pharmacy_store_product_id'
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
            ->notEmpty('code')
            ->add('code', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->requirePresence('qty', 'create')
            ->notEmpty('qty');

        $validator
            ->decimal('unit_price')
            ->requirePresence('unit_price', 'create')
            ->notEmpty('unit_price');

        $validator
            ->dateTime('expiry_date')
            ->requirePresence('expiry_date', 'create')
            ->notEmpty('expiry_date');

        $validator
            ->requirePresence('reorder_level', 'create')
            ->notEmpty('reorder_level');

        $validator
            ->integer('created_by')
            ->requirePresence('created_by', 'create')
            ->notEmpty('created_by');

        $validator
            ->integer('modified_by')
            ->requirePresence('modified_by', 'create')
            ->notEmpty('modified_by');

        $validator
            ->dateTime('deleted')
            ->allowEmpty('deleted');

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
        $rules->add($rules->isUnique(['code']));
        $rules->add($rules->existsIn(['pharmacy_product_id'], 'PharmacyProducts'));

        return $rules;
    }
}
