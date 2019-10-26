<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PharmacyInstitutions Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Institutions
 * @property \Cake\ORM\Association\HasMany $PharmacyOperators
 * @property \Cake\ORM\Association\HasMany $PharmacyProducts
 *
 * @method \App\Model\Entity\PharmacyInstitution get($primaryKey, $options = [])
 * @method \App\Model\Entity\PharmacyInstitution newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PharmacyInstitution[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PharmacyInstitution|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PharmacyInstitution patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PharmacyInstitution[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PharmacyInstitution findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PharmacyInstitutionsTable extends Table
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

        $this->table('pharmacy_institutions');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Institutions', [
            'foreignKey' => 'institution_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('PharmacyOperators', [
            'foreignKey' => 'pharmacy_institution_id'
        ]);
        $this->hasMany('PharmacyProducts', [
            'foreignKey' => 'pharmacy_institution_id'
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
        $rules->add($rules->existsIn(['institution_id'], 'Institutions'));

        return $rules;
    }
}
