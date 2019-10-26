<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VisitInterventionDoctors Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Doctors
 * @property \Cake\ORM\Association\BelongsTo $Visits
 * @property \Cake\ORM\Association\BelongsTo $VisitInvoices
 * @property \Cake\ORM\Association\HasMany $Exams
 * @property \Cake\ORM\Association\HasMany $PatientBookings
 * @property \Cake\ORM\Association\HasMany $Treatments
 * @property \Cake\ORM\Association\HasMany $VisitActDoctorDetails
 * @property \Cake\ORM\Association\HasMany $VisitNotes
 *
 * @method \App\Model\Entity\VisitInterventionDoctor get($primaryKey, $options = [])
 * @method \App\Model\Entity\VisitInterventionDoctor newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\VisitInterventionDoctor[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VisitInterventionDoctor|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VisitInterventionDoctor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VisitInterventionDoctor[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\VisitInterventionDoctor findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class VisitInterventionDoctorsTable extends Table
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

        $this->table('visit_intervention_doctors');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Doctors', [
            'foreignKey' => 'doctor_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Visits', [
            'foreignKey' => 'visit_id',
            'joinType' => 'INNER'
        ]);
        
        $this->belongsToMany('VisitActs',[
                'foreignKey' => 'visit_intervention_doctor_id',
                'targetForeignKey' => 'visit_act_id',
                'joinTable' => 'visit_act_doctor_details'
            ]);

        $this->belongsTo('VisitInvoices', [
            'foreignKey' => 'visit_invoice_id'
        ]);
        $this->hasMany('Exams', [
            'foreignKey' => 'visit_intervention_doctor_id'
        ]);
        $this->hasOne('PatientBookings', [
            'foreignKey' => 'visit_intervention_doctor_id'
        ]);
        $this->hasMany('Treatments', [
            'foreignKey' => 'visit_intervention_doctor_id'
        ]);
        $this->hasMany('VisitActDoctorDetails', [
            'foreignKey' => 'visit_intervention_doctor_id'
        ]);
        $this->hasMany('VisitNotes', [
            'foreignKey' => 'visit_intervention_doctor_id'
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
            ->allowEmpty('intervention_history_illness');

        $validator
            ->allowEmpty('intervention_report_exam');

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
        $rules->add($rules->existsIn(['doctor_id'], 'Doctors'));
        $rules->add($rules->existsIn(['visit_id'], 'Visits'));
        $rules->add($rules->existsIn(['visit_invoice_id'], 'VisitInvoices'));

        return $rules;
    }
}
