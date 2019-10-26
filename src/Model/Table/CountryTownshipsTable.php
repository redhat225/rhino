<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CountryTownships Model
 *
 * @property \Cake\ORM\Association\BelongsTo $CountryCities
 * @property \Cake\ORM\Association\HasMany $Institutions
 * @property \Cake\ORM\Association\HasMany $PeopleAdresses
 * @property \Cake\ORM\Association\HasMany $RequirementHolders
 *
 * @method \App\Model\Entity\CountryTownship get($primaryKey, $options = [])
 * @method \App\Model\Entity\CountryTownship newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CountryTownship[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CountryTownship|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CountryTownship patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CountryTownship[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CountryTownship findOrCreate($search, callable $callback = null)
 */
class CountryTownshipsTable extends Table
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

        $this->table('country_townships');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('CountryCities', [
            'foreignKey' => 'country_city_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Institutions', [
            'foreignKey' => 'country_township_id'
        ]);
        $this->hasMany('PeopleAdresses', [
            'foreignKey' => 'country_township_id'
        ]);
        $this->hasMany('RequirementHolders', [
            'foreignKey' => 'country_township_id'
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
            ->requirePresence('label_township', 'create')
            ->notEmpty('label_township');

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
        $rules->add($rules->existsIn(['country_city_id'], 'CountryCities'));

        return $rules;
    }
}
