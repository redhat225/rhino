<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RequirementSignificantInformation Entity
 *
 * @property int $id
 * @property \Cake\I18n\Time $begin
 * @property \Cake\I18n\Time $end
 * @property string $information_label
 * @property string $information_url
 * @property int $requirement_id
 *
 * @property \App\Model\Entity\Requirement $requirement
 */
class RequirementSignificantInformation extends Entity
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
