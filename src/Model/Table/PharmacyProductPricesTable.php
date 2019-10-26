<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PharmacyProductPrices Model
 *
 * @property \Cake\ORM\Association\BelongsTo $PharmacyProducts
 *
 * @method \App\Model\Entity\PharmacyProductPrice get($primaryKey, $options = [])
 * @method \App\Model\Entity\PharmacyProductPrice newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PharmacyProductPrice[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PharmacyProductPrice|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PharmacyProductPrice patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PharmacyProductPrice[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PharmacyProductPrice findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PharmacyProductPricesTable extends Table
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

        $this->table('pharmacy_product_prices');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('PharmacyProducts', [
            'foreignKey' => 'pharmacy_product_id',
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
            ->decimal('unit_price')
            ->requirePresence('unit_price', 'create')
            ->notEmpty('unit_price');

        $validator
            ->integer('created_by')
            ->requirePresence('created_by', 'create')
            ->notEmpty('created_by');

        $validator
            ->integer('modified_by')
            ->requirePresence('modified_by', 'create')
            ->notEmpty('modified_by');

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
        $rules->add($rules->existsIn(['pharmacy_product_id'], 'PharmacyProducts'));

        return $rules;
    }
}
