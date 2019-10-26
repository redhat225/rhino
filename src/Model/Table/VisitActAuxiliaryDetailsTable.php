<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VisitActAuxiliaryDetails Model
 *
 * @property \Cake\ORM\Association\BelongsTo $VisitInterventionAuxiliaries
 * @property \Cake\ORM\Association\BelongsTo $VisitActs
 *
 * @method \App\Model\Entity\VisitActAuxiliaryDetail get($primaryKey, $options = [])
 * @method \App\Model\Entity\VisitActAuxiliaryDetail newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\VisitActAuxiliaryDetail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VisitActAuxiliaryDetail|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VisitActAuxiliaryDetail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VisitActAuxiliaryDetail[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\VisitActAuxiliaryDetail findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class VisitActAuxiliaryDetailsTable extends Table
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

        $this->table('visit_act_auxiliary_details');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('VisitInterventionAuxiliaries', [
            'foreignKey' => 'visit_intervention_auxiliary_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('VisitActs', [
            'foreignKey' => 'visit_act_id',
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
            ->allowEmpty('details');

        $validator
            ->dateTime('deleted')
            ->allowEmpty('deleted');

        $validator
            ->allowEmpty('period');

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
        $rules->add($rules->existsIn(['visit_intervention_auxiliary_id'], 'VisitInterventionAuxiliaries'));
        $rules->add($rules->existsIn(['visit_act_id'], 'VisitActs'));

        return $rules;
    }
}
