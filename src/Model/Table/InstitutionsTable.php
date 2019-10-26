<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Institutions Model
 *
 * @property \Cake\ORM\Association\BelongsTo $InstitutionTypes
 * @property \Cake\ORM\Association\BelongsTo $CountryTownships
 * @property \Cake\ORM\Association\HasMany $DiaryTokens
 * @property \Cake\ORM\Association\HasMany $ExaminerInstitutions
 * @property \Cake\ORM\Association\HasMany $InstitutionAdresses
 * @property \Cake\ORM\Association\HasMany $InstitutionDoctors
 * @property \Cake\ORM\Association\HasMany $ManagerOperators
 * @property \Cake\ORM\Association\HasMany $PatientBookings
 * @property \Cake\ORM\Association\HasMany $PharmacyInstitutions
 * @property \Cake\ORM\Association\HasMany $VisitInvoiceItems
 *
 * @method \App\Model\Entity\Institution get($primaryKey, $options = [])
 * @method \App\Model\Entity\Institution newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Institution[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Institution|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Institution patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Institution[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Institution findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class InstitutionsTable extends Table
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

        $this->table('institutions');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('InstitutionTypes', [
            'foreignKey' => 'institution_type_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('CountryTownships', [
            'foreignKey' => 'country_township_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Doctors', [
            'foreignKey' => 'institution_id',
            'targetForeignKey'=>'doctor_id',
            'joinTable' => 'institution_doctors'
        ]);
        $this->hasOne('InstitutionSchedules',[
                'foreignKey' => 'institution_id'
            ]);

        $this->hasMany('PatientInsurances', [
            'foreignKey' => 'institution_id'
        ]);

        $this->hasMany('DiaryTokens', [
            'foreignKey' => 'institution_id'
        ]);
        $this->hasMany('ExaminerInstitutions', [
            'foreignKey' => 'institution_id'
        ]);
        $this->hasOne('InstitutionAdresses', [
            'foreignKey' => 'institution_id'
        ]);
        $this->hasMany('InstitutionDoctors', [
            'foreignKey' => 'institution_id'
        ]);
        $this->hasMany('ManagerOperators', [
            'foreignKey' => 'institution_id'
        ]);
        $this->hasMany('PatientBookings', [
            'foreignKey' => 'institution_id'
        ]);
        $this->hasMany('PharmacyInstitutions', [
            'foreignKey' => 'institution_id'
        ]);
        $this->hasMany('VisitInvoiceItems', [
            'foreignKey' => 'institution_id'
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
            ->requirePresence('fullname', 'create')
            ->notEmpty('fullname');

        $validator
            ->requirePresence('institution_quarter', 'create')
            ->notEmpty('institution_quarter');

        $validator
            ->requirePresence('institution_quarter_extra', 'create')
            ->notEmpty('institution_quarter_extra');

        $validator
            ->requirePresence('additional_info', 'create')
            ->notEmpty('additional_info');

        $validator
            ->requirePresence('institution_greeting', 'create')
            ->notEmpty('institution_greeting');

        $validator
            ->requirePresence('slug', 'create')
            ->notEmpty('slug');

        $validator
            ->allowEmpty('logo_institution');

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
        $rules->add($rules->existsIn(['institution_type_id'], 'InstitutionTypes'));
        $rules->add($rules->existsIn(['country_township_id'], 'CountryTownships'));

        return $rules;
    }
}
