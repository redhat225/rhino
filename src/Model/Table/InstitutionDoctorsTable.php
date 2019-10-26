<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * InstitutionDoctors Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Institutions
 * @property \Cake\ORM\Association\BelongsTo $Doctors
 * @property \Cake\ORM\Association\HasMany $DoctorSpecialities
 *
 * @method \App\Model\Entity\InstitutionDoctor get($primaryKey, $options = [])
 * @method \App\Model\Entity\InstitutionDoctor newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\InstitutionDoctor[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\InstitutionDoctor|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\InstitutionDoctor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\InstitutionDoctor[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\InstitutionDoctor findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class InstitutionDoctorsTable extends Table
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

        $this->table('institution_doctors');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Institutions', [
            'foreignKey' => 'institution_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Doctors', [
            'foreignKey' => 'doctor_id',
            'joinType' => 'INNER'
        ]);
         $this->belongsToMany('VisitSpecialities', [
            'foreignKey' => 'institution_doctor_id',
            'targetForeignKey' => 'doctor_speciality_id',
            'joinTable' => 'doctor_specialities'
        ]);
        $this->hasMany('DoctorSpecialities', [
            'foreignKey' => 'institution_doctor_id'
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
        $rules->add($rules->existsIn(['institution_id'], 'Institutions'));
        $rules->add($rules->existsIn(['doctor_id'], 'Doctors'));

        return $rules;
    }
}
