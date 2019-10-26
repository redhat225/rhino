<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VisitInterventionAuxiliaries Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Auxiliaries
 * @property \Cake\ORM\Association\BelongsTo $Visits
 * @property \Cake\ORM\Association\HasMany $VisitActAuxiliaryDetails
 *
 * @method \App\Model\Entity\VisitInterventionAuxiliary get($primaryKey, $options = [])
 * @method \App\Model\Entity\VisitInterventionAuxiliary newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\VisitInterventionAuxiliary[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VisitInterventionAuxiliary|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VisitInterventionAuxiliary patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VisitInterventionAuxiliary[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\VisitInterventionAuxiliary findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class VisitInterventionAuxiliariesTable extends Table
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

        $this->table('visit_intervention_auxiliaries');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Auxiliaries', [
            'foreignKey' => 'auxiliary_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Visits', [
            'foreignKey' => 'visit_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('VisitActAuxiliaryDetails', [
            'foreignKey' => 'visit_intervention_auxiliary_id'
        ]);

        $this->belongsToMany('VisitActs',[
                'foreignKey' => 'visit_intervention_auxiliary_id',
                'targetForeignKey' => 'visit_act_id',
                'joinTable' => 'visit_act_auxiliary_details'
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
            ->dateTime('deleted')
            ->allowEmpty('deleted');

        $validator
            ->requirePresence('details', 'create')
            ->notEmpty('details');


        $validator
            ->dateTime('intervention_done')
            ->allowEmpty('intervention_done');

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
        $rules->add($rules->existsIn(['auxiliary_id'], 'Auxiliaries'));
        $rules->add($rules->existsIn(['visit_id'], 'Visits'));

        return $rules;
    }
}
