<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VisitActDoctorDetails Model
 *
 * @property \Cake\ORM\Association\BelongsTo $VisitActs
 * @property \Cake\ORM\Association\BelongsTo $VisitInterventionDoctors
 *
 * @method \App\Model\Entity\VisitActDoctorDetail get($primaryKey, $options = [])
 * @method \App\Model\Entity\VisitActDoctorDetail newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\VisitActDoctorDetail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VisitActDoctorDetail|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VisitActDoctorDetail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VisitActDoctorDetail[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\VisitActDoctorDetail findOrCreate($search, callable $callback = null)
 */
class VisitActDoctorDetailsTable extends Table
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

        $this->table('visit_act_doctor_details');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('VisitActs', [
            'foreignKey' => 'visit_act_id',
            'joinType' => 'INNER'
        ]);
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
            ->allowEmpty('details');


        $validator
            ->allowEmpty('period');


        $validator
            ->dateTime('deleted')
            ->allowEmpty('deleted');

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
        $rules->add($rules->existsIn(['visit_act_id'], 'VisitActs'));
        $rules->add($rules->existsIn(['visit_intervention_doctor_id'], 'VisitInterventionDoctors'));

        return $rules;
    }
}
