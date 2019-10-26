<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PharmacyProductCategories Model
 *
 * @property \Cake\ORM\Association\HasMany $PharmacyProducts
 *
 * @method \App\Model\Entity\PharmacyProductCategory get($primaryKey, $options = [])
 * @method \App\Model\Entity\PharmacyProductCategory newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PharmacyProductCategory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PharmacyProductCategory|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PharmacyProductCategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PharmacyProductCategory[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PharmacyProductCategory findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PharmacyProductCategoriesTable extends Table
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

        $this->table('pharmacy_product_categories');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('PharmacyProducts', [
            'foreignKey' => 'pharmacy_product_category_id'
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
            ->notEmpty('alias');

        $validator
            ->requirePresence('details', 'create')
            ->notEmpty('details');

        $validator
            ->integer('parent')
            ->requirePresence('parent', 'create')
            ->notEmpty('parent');

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
}
