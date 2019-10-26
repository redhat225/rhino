<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RequirementHolder Entity
 *
 * @property int $id
 * @property string $holder_name
 * @property string $holder_adress
 * @property string $holder_contact
 * @property int $country_township_id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\CountryTownship $country_township
 * @property \App\Model\Entity\RequirementHolderDetail[] $requirement_holder_details
 */
class RequirementHolder extends Entity
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
