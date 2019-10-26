<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VisitActAuxiliaryDetail Entity
 *
 * @property int $id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property int $visit_intervention_auxiliary_id
 * @property int $visit_act_id
 * @property string $details
 *
 * @property \App\Model\Entity\VisitInterventionAuxiliary $visit_intervention_auxiliary
 * @property \App\Model\Entity\VisitAct $visit_act
 */
class VisitActAuxiliaryDetail extends Entity
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
