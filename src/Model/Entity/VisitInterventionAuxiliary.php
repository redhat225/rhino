<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VisitInterventionAuxiliary Entity
 *
 * @property int $id
 * @property int $auxiliary_id
 * @property int $visit_id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \Cake\I18n\Time $deleted
 * @property string $details
 *
 * @property \App\Model\Entity\Auxiliary $auxiliary
 * @property \App\Model\Entity\Visit $visit
 * @property \App\Model\Entity\VisitActAuxiliaryDetail[] $visit_act_auxiliary_details
 */
class VisitInterventionAuxiliary extends Entity
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
