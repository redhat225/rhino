<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Visit Entity
 *
 * @property int $id
 * @property string $visit_motif
 * @property string $code_visit
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \Cake\I18n\Time $deleted
 * @property int $patient_id
 *
 * @property \App\Model\Entity\VisitKindTransport $visit_kind_transport
 * @property \App\Model\Entity\VisitLevel $visit_level
 * @property \App\Model\Entity\Patient $patient
 * @property \App\Model\Entity\ManagerOperator $manager_operator
 * @property \App\Model\Entity\VisitSpeciality $visit_speciality
 * @property \App\Model\Entity\VisitType $visit_type
 * @property \App\Model\Entity\VisitAct[] $visit_acts
 * @property \App\Model\Entity\VisitInvoice[] $visit_invoices
 * @property \App\Model\Entity\VisitMeeting[] $visit_meetings
 * @property \App\Model\Entity\VisitOrderDetail[] $visit_order_details
 */
class Visit extends Entity
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
