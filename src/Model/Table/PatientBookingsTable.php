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
 * PatientBookings Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Doctors
 * @property \Cake\ORM\Association\BelongsTo $Patients
 * @property \Cake\ORM\Association\BelongsTo $Institutions
 * @property \Cake\ORM\Association\BelongsTo $VisitMeetings
 *
 * @method \App\Model\Entity\PatientBooking get($primaryKey, $options = [])
 * @method \App\Model\Entity\PatientBooking newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PatientBooking[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PatientBooking|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PatientBooking patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PatientBooking[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PatientBooking findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PatientBookingsTable extends Table
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

        $this->table('patient_bookings');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Doctors', [
            'foreignKey' => 'doctor_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Patients', [
            'foreignKey' => 'patient_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('VisitSpecialities', [
            'foreignKey' => 'visit_speciality_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Institutions', [
            'foreignKey' => 'institution_id',
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
            ->requirePresence('code_booking','create')
            ->notEmpty('code_booking');

        $validator
            ->dateTime('deleted')
            ->allowEmpty('deleted');

        $validator
            ->dateTime('expected_date_booking')
            ->requirePresence('expected_date_booking', 'create')
            ->notEmpty('expected_date_booking');

        $validator
            ->integer('state')
            ->requirePresence('state', 'create')
            ->notEmpty('state');

        return $validator;
    }

    public function beforeMarshal(Event $event , ArrayObject $data, ArrayObject $options)
    {
        //checking the type of the requests
        if(isset($data['type_request']))
        {
            switch($data['type_request'])
            {
                case 'web_save':
                    //marshalling data for saving a new patient-booking
                    $dateTime = $data['partial_date_expected']." ".$data['partial_time_expected'].":00";
                    $reserv_date = new \DateTime($dateTime);
                    $data['expected_date_booking'] = $reserv_date;

                    $data['doctor_id'] = $data['doctor_id'];

                    $data['institution_id'] = $data['institution_id'];

                    $data['state'] = $data['state'];

                    //generating a code_booking
                    $PatientBookings = TableRegistry::get('PatientBookings');
                    $row_count_patient = $PatientBookings->find()
                                                          ->where(['PatientBookings.patient_id'=>$data['patient_id']])
                                                          ->count();
                    $code_booking = 'R'.($row_count_patient+1)."-".uniqid(true);

                    $data['code_booking'] = $code_booking;
                break;

                case 'web_edit':
                    $data['doctor_id']=$data['doctor_id'];
                    
                    $data['institution_id'] =$data['institution_id'];

                    $dateTime = $data['expected_meeting_date']." ".$data['expected_meeting_time'].":00";
                    $reserv_date = new \DateTime($dateTime);
                    $data['expected_date_booking'] =$reserv_date;
                break;
            }

        }

        if(isset($data['state_invoice']))
        {
                //generating a code_booking
                $PatientBookings = TableRegistry::get('PatientBookings');
                $row_count_patient = $PatientBookings->find()
                                                      ->where(['PatientBookings.patient_id'=>$data['patient_id']])
                                                      ->count();
                $code_booking = 'R'.($row_count_patient+1)."-".uniqid(true);

                $data['code_booking'] = $code_booking;
        }

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
        $rules->add($rules->existsIn(['patient_id'], 'Patients'));
        $rules->add($rules->existsIn(['institution_id'], 'Institutions'));
        $rules->add($rules->existsIn(['visit_speciality_id'], 'VisitSpecialities'));
        $rules->add($rules->existsIn(['visit_intervention_doctor_id'], 'VisitInterventionDoctors'));

        return $rules;
    }
}
