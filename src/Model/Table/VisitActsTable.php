<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VisitActs Model
 *
 * @property \Cake\ORM\Association\BelongsTo $VisitActSubCategories
 * @property \Cake\ORM\Association\HasMany $VisitActAuxiliaryDetails
 * @property \Cake\ORM\Association\HasMany $VisitActDoctorDetails
 *
 * @method \App\Model\Entity\VisitAct get($primaryKey, $options = [])
 * @method \App\Model\Entity\VisitAct newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\VisitAct[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VisitAct|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VisitAct patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VisitAct[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\VisitAct findOrCreate($search, callable $callback = null)
 */
class VisitActsTable extends Table
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

        $this->table('visit_acts');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('VisitActSubCategories', [
            'foreignKey' => 'visit_act_sub_category_id',
            'joinType' => 'INNER'
        ]);

        $this->belongsToMany('VisitInterventionDoctors',[
                'foreignKey' => 'visit_act_id',
                'targetForeignKey' => 'visit_intervention_doctor_id',
                'joinTable' => 'visit_act_doctor_details'
        ]);

        $this->belongsToMany('VisitInvoices',[
                'foreignKey' => 'visit_act_id',
                'targetForeignKey' => 'visit_invoice_id',
                'joinTable' => 'visit_invoice_details'
        ]);

        $this->belongsToMany('VisitInterventionAuxiliaries',[
                'foreignKey' => 'visit_act_id',
                'targetForeignKey' => 'visit_intervention_auxiliary_id',
                'joinTable' => 'visit_act_auxiliary_details'
        ]);

        $this->hasMany('VisitActAuxiliaryDetails', [
            'foreignKey' => 'visit_act_id'
        ]);
        $this->hasMany('VisitActDoctorDetails', [
            'foreignKey' => 'visit_act_id'
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
            ->requirePresence('label', 'create')
            ->notEmpty('label');

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
        $rules->add($rules->existsIn(['visit_act_sub_category_id'], 'VisitActSubCategories'));

        return $rules;
    }
}
