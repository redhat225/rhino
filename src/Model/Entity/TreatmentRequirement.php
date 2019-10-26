<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TreatmentRequirement Entity
 *
 * @property int $id
 * @property string $label_requirement
 * @property string $requirement_cis_code
 * @property int $requirement_id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property int $treatment_id
 * @property int $requirement_duration
 *
 * @property \App\Model\Entity\Treatment $treatment
 */
class TreatmentRequirement extends Entity
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
