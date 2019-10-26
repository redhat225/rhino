<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Event\Event;
use ArrayObject;

/**
 * PeopleDescendants Model
 *
 * @property \Cake\ORM\Association\BelongsTo $People
 *
 * @method \App\Model\Entity\PeopleDescendant get($primaryKey, $options = [])
 * @method \App\Model\Entity\PeopleDescendant newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PeopleDescendant[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PeopleDescendant|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PeopleDescendant patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PeopleDescendant[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PeopleDescendant findOrCreate($search, callable $callback = null)
 */
class PeopleDescendantsTable extends Table
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

        $this->table('people_descendants');
        $this->displayField('id');
        $this->primaryKey('id');

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
            ->requirePresence('firstname', 'create')
            ->notEmpty('firstname');

        $validator
            ->requirePresence('lastname', 'create')
            ->notEmpty('lastname');

        $validator
            ->requirePresence('sexe', 'create')
            ->notEmpty('sexe');

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
