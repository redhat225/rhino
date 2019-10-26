<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RequirementSignificantInformations Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Requirements
 *
 * @method \App\Model\Entity\RequirementSignificantInformation get($primaryKey, $options = [])
 * @method \App\Model\Entity\RequirementSignificantInformation newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RequirementSignificantInformation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RequirementSignificantInformation|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RequirementSignificantInformation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RequirementSignificantInformation[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RequirementSignificantInformation findOrCreate($search, callable $callback = null)
 */
class RequirementSignificantInformationsTable extends Table
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

        $this->table('requirement_significant_informations');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Requirements', [
            'foreignKey' => 'requirement_id',
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
            ->dateTime('begin')
            ->requirePresence('begin', 'create')
            ->notEmpty('begin');

        $validator
            ->dateTime('end')
            ->allowEmpty('end');

        $validator
            ->requirePresence('information_label', 'create')
            ->notEmpty('information_label');

        $validator
            ->requirePresence('information_url', 'create')
            ->notEmpty('information_url');

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
        $rules->add($rules->existsIn(['requirement_id'], 'Requirements'));

        return $rules;
    }
}
