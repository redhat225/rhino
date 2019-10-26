<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VisitInterventionDoctor Entity
 *
 * @property int $id
 * @property int $doctor_id
 * @property int $visit_id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \Cake\I18n\Time $deleted
 * @property string $intervention_history_illness
 * @property string $intervention_report_exam
 * @property bool $intervention_done
 * @property int $visit_invoice_id
 *
 * @property \App\Model\Entity\Doctor $doctor
 * @property \App\Model\Entity\Visit $visit
 * @property \App\Model\Entity\VisitInvoice $visit_invoice
 * @property \App\Model\Entity\Exam[] $exams
 * @property \App\Model\Entity\PatientBooking[] $patient_bookings
 * @property \App\Model\Entity\Treatment[] $treatments
 * @property \App\Model\Entity\VisitActDoctorDetail[] $visit_act_doctor_details
 * @property \App\Model\Entity\VisitNote[] $visit_notes
 */
class VisitInterventionDoctor extends Entity
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
