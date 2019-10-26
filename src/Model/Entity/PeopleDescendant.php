<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PeopleDescendant Entity
 *
 * @property int $id
 * @property int $people_id
 * @property string $firstname
 * @property string $lastname
 * @property string $sexe
 *
 * @property \App\Model\Entity\Person $person
 */
class PeopleDescendant extends Entity
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
