<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VisitInvoiceTypes Model
 *
 * @property \Cake\ORM\Association\HasMany $VisitInvoices
 *
 * @method \App\Model\Entity\VisitInvoiceType get($primaryKey, $options = [])
 * @method \App\Model\Entity\VisitInvoiceType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\VisitInvoiceType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VisitInvoiceType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VisitInvoiceType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VisitInvoiceType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\VisitInvoiceType findOrCreate($search, callable $callback = null)
 */
class VisitInvoiceTypesTable extends Table
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

        $this->table('visit_invoice_types');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->hasMany('VisitInvoices', [
            'foreignKey' => 'visit_invoice_type_id'
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
            ->requirePresence('label', 'create')
            ->notEmpty('label');

        return $validator;
    }
}
