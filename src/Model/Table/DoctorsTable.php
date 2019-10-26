<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Doctors Model
 *
 * @property \Cake\ORM\Association\BelongsTo $People
 * @property \Cake\ORM\Association\HasMany $DiaryTokens
 * @property \Cake\ORM\Association\HasMany $DoctorActDetails
 * @property \Cake\ORM\Association\HasMany $DoctorSpecialityDetails
 * @property \Cake\ORM\Association\HasMany $VisitMeetings
 * @property \Cake\ORM\Association\HasMany $Visits
 *
 * @method \App\Model\Entity\Doctor get($primaryKey, $options = [])
 * @method \App\Model\Entity\Doctor newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Doctor[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Doctor|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Doctor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Doctor[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Doctor findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DoctorsTable extends Table
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

        $this->table('doctors');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('People', [
            'foreignKey' => 'people_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Institutions', [
            'foreignKey' => 'doctor_id',
            'targetForeignKey'=>'institution_id',
            'joinTable' => 'institution_doctors'
        ]);
        $this->hasMany('InstitutionDoctors', [
            'foreignKey' => 'doctor_id'
        ]);
        $this->hasMany('DiaryTokens', [
            'foreignKey' => 'doctor_id'
        ]);
        $this->hasMany('DoctorActDetails', [
            'foreignKey' => 'doctor_id'
        ]);
        $this->hasMany('VisitInterventionDoctors', [
            'foreignKey' => 'doctor_id'
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
            ->requirePresence('username', 'create')
            ->notEmpty('username');

        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->requirePresence('code', 'create')
            ->notEmpty('code');

        $validator
            ->requirePresence('avatar_doctor', 'create')
            ->notEmpty('avatar_doctor');

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
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['people_id'], 'People'));

        return $rules;
    }

    public function findAuthDoctor(Query $query, array $options)
    {
        return $query->contain(['People']);
    }
}
