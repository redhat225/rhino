<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VisitSpecialities Model
 *
 * @property \Cake\ORM\Association\HasMany $Visits
 *
 * @method \App\Model\Entity\VisitSpeciality get($primaryKey, $options = [])
 * @method \App\Model\Entity\VisitSpeciality newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\VisitSpeciality[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VisitSpeciality|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VisitSpeciality patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VisitSpeciality[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\VisitSpeciality findOrCreate($search, callable $callback = null)
 */
class VisitSpecialitiesTable extends Table
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

        $this->table('visit_specialities');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->hasMany('Visits', [
            'foreignKey' => 'visit_speciality_id'
        ]);

        $this->hasMany('PatientBookings', [
            'foreignKey' => 'visit_speciality_id'
        ]);

         $this->belongsToMany('InstitutionDoctors', [
            'foreignKey' => 'visit_speciality_id',
            'targetForeignKey' => 'institution_doctor_id',
            'joinTable' => 'doctor_specialities'
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
            ->requirePresence('libelle', 'create')
            ->notEmpty('libelle');

        return $validator;
    }
}
