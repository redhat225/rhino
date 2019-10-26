<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PeopleSituations Model
 *
 * @property \Cake\ORM\Association\BelongsTo $People
 *
 * @method \App\Model\Entity\PeopleSituation get($primaryKey, $options = [])
 * @method \App\Model\Entity\PeopleSituation newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PeopleSituation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PeopleSituation|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PeopleSituation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PeopleSituation[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PeopleSituation findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PeopleSituationsTable extends Table
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

        $this->table('people_situations');
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
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        $validator
            ->integer('children')
            ->requirePresence('children', 'create')
            ->notEmpty('children');

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
        $rules->add($rules->existsIn(['people_id'], 'People'));

        return $rules;
    }
}
