<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Event\Event;
use ArrayObject;

/**
 * PeopleAttributes Model
 *
 * @property \Cake\ORM\Association\BelongsTo $People
 *
 * @method \App\Model\Entity\PeopleAttribute get($primaryKey, $options = [])
 * @method \App\Model\Entity\PeopleAttribute newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PeopleAttribute[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PeopleAttribute|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PeopleAttribute patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PeopleAttribute[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PeopleAttribute findOrCreate($search, callable $callback = null)
 */
class PeopleAttributesTable extends Table
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

        $this->table('people_attributes');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('People', [
            'foreignKey' => 'people_id',
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
            ->integer('height')
            ->requirePresence('height', 'create')
            ->notEmpty('height');

        $validator
            ->requirePresence('skin', 'create')
            ->notEmpty('skin');

        $validator
            ->allowEmpty('eyes');

        $validator
            ->allowEmpty('haircolour');

        $validator
            ->allowEmpty('weight')
            ->integer('weight');

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
        return $rules;
    }
}
