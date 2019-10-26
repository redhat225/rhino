<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PharmacyProducts Model
 *
 * @property \Cake\ORM\Association\BelongsTo $PharmacyProductCategories
 * @property \Cake\ORM\Association\BelongsTo $PharmacyInstitutions
 * @property \Cake\ORM\Association\HasMany $PharmacyProductPrices
 * @property \Cake\ORM\Association\HasMany $PharmacyStoreProducts
 *
 * @method \App\Model\Entity\PharmacyProduct get($primaryKey, $options = [])
 * @method \App\Model\Entity\PharmacyProduct newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PharmacyProduct[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PharmacyProduct|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PharmacyProduct patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PharmacyProduct[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PharmacyProduct findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PharmacyProductsTable extends Table
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

        $this->table('pharmacy_products');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('PharmacyProductCategories', [
            'foreignKey' => 'pharmacy_product_category_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('PharmacyInstitutions', [
            'foreignKey' => 'pharmacy_institution_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('PharmacyProductPrices', [
            'foreignKey' => 'pharmacy_product_id'
        ]);
        $this->hasMany('PharmacyStoreProducts', [
            'foreignKey' => 'pharmacy_product_id'
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

        $validator
            ->requirePresence('alias', 'create')
            ->notEmpty('alias')
            ->add('alias', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->requirePresence('details', 'create')
            ->notEmpty('details');

        $validator
            ->allowEmpty('picture');

        $validator
            ->dateTime('deleted')
            ->allowEmpty('deleted');

        $validator
            ->integer('created_by')
            ->requirePresence('created_by', 'create')
            ->notEmpty('created_by');

        $validator
            ->integer('updated_by')
            ->requirePresence('updated_by', 'create')
            ->notEmpty('updated_by');

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
        $rules->add($rules->isUnique(['alias']));
        $rules->add($rules->existsIn(['pharmacy_product_category_id'], 'PharmacyProductCategories'));
        $rules->add($rules->existsIn(['pharmacy_institution_id'], 'PharmacyInstitutions'));

        return $rules;
    }
}
