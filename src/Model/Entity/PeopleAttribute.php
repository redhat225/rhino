<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PeopleAttribute Entity
 *
 * @property int $id
 * @property int $people_id
 * @property int $height
 * @property string $skin
 * @property string $eyes
 * @property string $haircolour
 * @property int $weight
 *
 * @property \App\Model\Entity\Person $person
 */
class PeopleAttribute extends Entity
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
