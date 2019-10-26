<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CountryCities Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Countries
 * @property \Cake\ORM\Association\HasMany $CountryTownships
 *
 * @method \App\Model\Entity\CountryCity get($primaryKey, $options = [])
 * @method \App\Model\Entity\CountryCity newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CountryCity[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CountryCity|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CountryCity patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CountryCity[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CountryCity findOrCreate($search, callable $callback = null)
 */
class CountryCitiesTable extends Table
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

        $this->table('country_cities');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Countries', [
            'foreignKey' => 'country_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('CountryTownships', [
            'foreignKey' => 'country_city_id'
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
            ->requirePresence('label_city', 'create')
            ->notEmpty('label_city');

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
        $rules->add($rules->existsIn(['country_id'], 'Countries'));

        return $rules;
    }
}
