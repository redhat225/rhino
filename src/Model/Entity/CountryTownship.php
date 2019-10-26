<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CountryTownship Entity
 *
 * @property int $id
 * @property int $country_city_id
 * @property string $label_township
 *
 * @property \App\Model\Entity\CountryCity $country_city
 * @property \App\Model\Entity\Institution[] $institutions
 * @property \App\Model\Entity\PeopleAdress[] $people_adresses
 * @property \App\Model\Entity\RequirementHolder[] $requirement_holders
 */
class CountryTownship extends Entity
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
