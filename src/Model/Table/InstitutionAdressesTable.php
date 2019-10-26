<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * InstitutionAdresses Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Institutions
 *
 * @method \App\Model\Entity\InstitutionAdress get($primaryKey, $options = [])
 * @method \App\Model\Entity\InstitutionAdress newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\InstitutionAdress[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\InstitutionAdress|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\InstitutionAdress patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\InstitutionAdress[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\InstitutionAdress findOrCreate($search, callable $callback = null)
 */
class InstitutionAdressesTable extends Table
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

        $this->table('institution_adresses');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Institutions', [
            'foreignKey' => 'institution_id',
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
            ->requirePresence('fax', 'create')
            ->notEmpty('fax');

        $validator
            ->requirePresence('postal_box', 'create')
            ->notEmpty('postal_box');

        $validator
            ->requirePresence('tel', 'create')
            ->notEmpty('tel');

        $validator
            ->requirePresence('prefix', 'create')
            ->notEmpty('prefix');

        $validator
            ->requirePresence('contact1', 'create')
            ->notEmpty('contact1');

        $validator
            ->requirePresence('contact2', 'create')
            ->notEmpty('contact2');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->requirePresence('website', 'create')
            ->notEmpty('website');

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['institution_id'], 'Institutions'));

        return $rules;
    }
}
