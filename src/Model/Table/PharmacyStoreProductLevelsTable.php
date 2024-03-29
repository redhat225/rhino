<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PharmacyStoreProductLevels Model
 *
 * @property \Cake\ORM\Association\BelongsTo $PharmacyStoreProducts
 *
 * @method \App\Model\Entity\PharmacyStoreProductLevel get($primaryKey, $options = [])
 * @method \App\Model\Entity\PharmacyStoreProductLevel newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PharmacyStoreProductLevel[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PharmacyStoreProductLevel|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PharmacyStoreProductLevel patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PharmacyStoreProductLevel[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PharmacyStoreProductLevel findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PharmacyStoreProductLevelsTable extends Table
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

        $this->table('pharmacy_store_product_levels');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('PharmacyStoreProducts', [
            'foreignKey' => 'pharmacy_store_product_id',
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
            ->requirePresence('qty', 'create')
            ->notEmpty('qty');

        $validator
            ->integer('ref_order')
            ->requirePresence('ref_order', 'create')
            ->notEmpty('ref_order');

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
        $rules->add($rules->existsIn(['pharmacy_store_product_id'], 'PharmacyStoreProducts'));

        return $rules;
    }
}
