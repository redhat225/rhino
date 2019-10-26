<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PharmacyCustomers Model
 *
 * @property \Cake\ORM\Association\HasMany $PharmacyInvoices
 *
 * @method \App\Model\Entity\PharmacyCustomer get($primaryKey, $options = [])
 * @method \App\Model\Entity\PharmacyCustomer newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PharmacyCustomer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PharmacyCustomer|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PharmacyCustomer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PharmacyCustomer[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PharmacyCustomer findOrCreate($search, callable $callback = null)
 */
class PharmacyCustomersTable extends Table
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

        $this->table('pharmacy_customers');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->hasMany('PharmacyInvoices', [
            'foreignKey' => 'pharmacy_customer_id'
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
            ->requirePresence('fullname', 'create')
            ->notEmpty('fullname');

        $validator
            ->requirePresence('code', 'create')
            ->notEmpty('code');

        $validator
            ->integer('type')
            ->requirePresence('type', 'create')
            ->notEmpty('type');

        $validator
            ->integer('ispatient')
            ->requirePresence('ispatient', 'create')
            ->notEmpty('ispatient');

        return $validator;
    }
}
