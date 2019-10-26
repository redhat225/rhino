<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RequirementPresentations Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Requirements
 *
 * @method \App\Model\Entity\RequirementPresentation get($primaryKey, $options = [])
 * @method \App\Model\Entity\RequirementPresentation newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RequirementPresentation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RequirementPresentation|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RequirementPresentation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RequirementPresentation[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RequirementPresentation findOrCreate($search, callable $callback = null)
 */
class RequirementPresentationsTable extends Table
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

        $this->table('requirement_presentations');
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
            ->requirePresence('presentation_description', 'create')
            ->notEmpty('presentation_description');

        $validator
            ->allowEmpty('presentation_code');

        $validator
            ->requirePresence('presentation_administration_status', 'create')
            ->notEmpty('presentation_administration_status');

        $validator
            ->requirePresence('presentation_administration_state', 'create')
            ->notEmpty('presentation_administration_state');

        $validator
            ->date('presentation_administration_date')
            ->requirePresence('presentation_administration_date', 'create')
            ->notEmpty('presentation_administration_date');

        $validator
            ->numeric('presentation_price')
            ->requirePresence('presentation_price', 'create')
            ->notEmpty('presentation_price');

        $validator
            ->requirePresence('presentation_renewal_indications', 'create')
            ->notEmpty('presentation_renewal_indications');

        $validator
            ->boolean('presentation_agreement')
            ->requirePresence('presentation_agreement', 'create')
            ->notEmpty('presentation_agreement');

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
