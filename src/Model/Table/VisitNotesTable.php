<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VisitNotes Model
 *
 * @property \Cake\ORM\Association\BelongsTo $VisitInterventionDoctors
 *
 * @method \App\Model\Entity\VisitNote get($primaryKey, $options = [])
 * @method \App\Model\Entity\VisitNote newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\VisitNote[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VisitNote|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VisitNote patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VisitNote[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\VisitNote findOrCreate($search, callable $callback = null)
 */
class VisitNotesTable extends Table
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

        $this->table('visit_notes');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('VisitInterventionDoctors', [
            'foreignKey' => 'visit_intervention_doctor_id',
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
            ->requirePresence('content_note', 'create')
            ->notEmpty('content_note');

        $validator
            ->integer('state')
            ->requirePresence('state', 'create')
            ->notEmpty('state');

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
        $rules->add($rules->existsIn(['visit_intervention_doctor_id'], 'VisitInterventionDoctors'));

        return $rules;
    }
}
