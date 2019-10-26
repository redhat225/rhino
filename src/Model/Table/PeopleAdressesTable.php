<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use ArrayObject;

/**
 * PeopleAdresses Model
 *
 * @property \Cake\ORM\Association\BelongsTo $People
 * @property \Cake\ORM\Association\BelongsTo $CountryTownships
 *
 * @method \App\Model\Entity\PeopleAdress get($primaryKey, $options = [])
 * @method \App\Model\Entity\PeopleAdress newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PeopleAdress[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PeopleAdress|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PeopleAdress patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PeopleAdress[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PeopleAdress findOrCreate($search, callable $callback = null)
 */
class PeopleAdressesTable extends Table
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

        $this->table('people_adresses');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('People', [
            'foreignKey' => 'people_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('CountryTownships', [
            'foreignKey' => 'country_township_id',
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
            ->requirePresence('city_quarter', 'create')
            ->notEmpty('city_quarter');

        $validator
            ->allowEmpty('postal_adress');

        return $validator;
    }

    public function beforeMarshal(Event $event, ArrayObject $data, ArrayObject $options)
    {
        switch($data['state-operation'])
        {
            case 'registering-patient':

            break;
        }
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
        $rules->add($rules->existsIn(['people_id'], 'People'));
        $rules->add($rules->existsIn(['country_township_id'], 'CountryTownships'));

        return $rules;
    }
}
