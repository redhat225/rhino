<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RequirementPresentation Entity
 *
 * @property int $id
 * @property string $presentation_description
 * @property int $requirement_id
 * @property string $presentation_code
 * @property string $presentation_administration_status
 * @property string $presentation_administration_state
 * @property \Cake\I18n\Time $presentation_administration_date
 * @property float $presentation_price
 * @property string $presentation_renewal_indications
 * @property bool $presentation_agreement
 *
 * @property \App\Model\Entity\Requirement $requirement
 */
class RequirementPresentation extends Entity
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
