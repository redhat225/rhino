<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TreatmentRequirementAlert Entity
 *
 * @property int $id
 * @property int $treatment_requirement_id
 * @property int $alert_level
 * @property string $alert_label
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property string $alert_description
 *
 * @property \App\Model\Entity\TreatmentRequirement $treatment_requirement
 */
class TreatmentRequirementAlert extends Entity
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