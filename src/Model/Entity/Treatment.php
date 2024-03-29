<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Treatment Entity
 *
 * @property int $id
 * @property int $visit_intervention_doctor_id
 * @property string $description
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property string $diary
 *
 * @property \App\Model\Entity\VisitMeeting $visit_meeting
 * @property \App\Model\Entity\TreatmentType $treatment_type
 * @property \App\Model\Entity\TreatmentRequirement[] $treatment_requirements
 */
class Treatment extends Entity
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
