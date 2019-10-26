<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PatientBooking Entity
 *
 * @property int $id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \Cake\I18n\Time $expected_date_booking
 * @property int $doctor_id
 * @property int $patient_id
 * @property int $institution_id
 * @property int $visit_meeting_id
 * @property int $state
 *
 * @property \App\Model\Entity\Doctor $doctor
 * @property \App\Model\Entity\Patient $patient
 * @property \App\Model\Entity\Institution $institution
 * @property \App\Model\Entity\VisitMeeting $visit_meeting
 */
class PatientBooking extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
