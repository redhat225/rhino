<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VisitMeeting Entity
 *
 * @property int $id
 * @property string $code
 * @property int $visit_id
 * @property int $doctor_id
 * @property int $visit_invoice_id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \Cake\I18n\Time $deleted
 * @property string $diary
 * @property int $patient_id
 * @property \Cake\I18n\Time $expected_meeting_date
 * @property \Cake\I18n\Time $next_meeting
 * @property int $done
 * @property int $manager_operator_id
 * @property int $visit_meeting_type_id
 *
 * @property \App\Model\Entity\Visit $visit
 * @property \App\Model\Entity\Doctor $doctor
 * @property \App\Model\Entity\Patient $patient
 * @property \App\Model\Entity\Exam[] $exams
 * @property \App\Model\Entity\Treatment[] $treatments
 * @property \App\Model\Entity\VisitMeetingConstant[] $visit_meeting_constants
 */
class VisitMeeting extends Entity
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
