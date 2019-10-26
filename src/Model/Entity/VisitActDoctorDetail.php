<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VisitActDoctorDetail Entity
 *
 * @property int $id
 * @property int $visit_act_id
 * @property int $visit_intervention_doctor_id
 * @property string $details
 *
 * @property \App\Model\Entity\VisitAct $visit_act
 * @property \App\Model\Entity\VisitInterventionDoctor $visit_intervention_doctor
 */
class VisitActDoctorDetail extends Entity
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
