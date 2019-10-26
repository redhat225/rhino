<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;
use Cake\Event\Event;
use ArrayObject;

/**
 * DoctorSpecialities Model
 *
 * @property \Cake\ORM\Association\BelongsTo $VisitSpecialities
 * @property \Cake\ORM\Association\BelongsTo $InstitutionDoctors
 *
 * @method \App\Model\Entity\DoctorSpeciality get($primaryKey, $options = [])
 * @method \App\Model\Entity\DoctorSpeciality newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DoctorSpeciality[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DoctorSpeciality|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DoctorSpeciality patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DoctorSpeciality[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DoctorSpeciality findOrCreate($search, callable $callback = null)
 */
class DoctorSpecialitiesTable extends Table
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

        $this->table('doctor_specialities');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('VisitSpecialities', [
            'foreignKey' => 'visit_speciality_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('InstitutionDoctors', [
            'foreignKey' => 'institution_doctor_id',
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
        $rules->add($rules->existsIn(['visit_speciality_id'], 'VisitSpecialities'));
        $rules->add($rules->existsIn(['institution_doctor_id'], 'InstitutionDoctors'));

        return $rules;
    }

    public function beforeMarshal(Event $event, ArrayObject $data, ArrayObject $options)
    {

    }
}
