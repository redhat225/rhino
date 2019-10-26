<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PharmacyOperators Model
 *
 * @property \Cake\ORM\Association\BelongsTo $People
 * @property \Cake\ORM\Association\BelongsTo $PharmacyInstitutions
 * @property \Cake\ORM\Association\BelongsTo $PharmacyRoles
 * @property \Cake\ORM\Association\HasMany $PharmacyInvoices
 * @property \Cake\ORM\Association\HasMany $PharmacyOperatorActDetails
 *
 * @method \App\Model\Entity\PharmacyOperator get($primaryKey, $options = [])
 * @method \App\Model\Entity\PharmacyOperator newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PharmacyOperator[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PharmacyOperator|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PharmacyOperator patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PharmacyOperator[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PharmacyOperator findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PharmacyOperatorsTable extends Table
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

        $this->table('pharmacy_operators');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('People', [
            'foreignKey' => 'people_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('PharmacyInstitutions', [
            'foreignKey' => 'pharmacy_institution_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('PharmacyRoles', [
            'foreignKey' => 'pharmacy_role_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('PharmacyInvoices', [
            'foreignKey' => 'pharmacy_operator_id'
        ]);
        $this->hasMany('PharmacyOperatorActDetails', [
            'foreignKey' => 'pharmacy_operator_id'
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
            ->notEmpty('code');

        $validator
            ->requirePresence('username', 'create')
            ->notEmpty('username');

        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
            ->allowEmpty('avatar');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

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
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['people_id'], 'People'));
        $rules->add($rules->existsIn(['pharmacy_institution_id'], 'PharmacyInstitutions'));
        $rules->add($rules->existsIn(['pharmacy_role_id'], 'PharmacyRoles'));

        return $rules;
    }
}
