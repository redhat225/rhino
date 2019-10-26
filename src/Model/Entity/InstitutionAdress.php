<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * InstitutionAdress Entity
 *
 * @property int $id
 * @property string $fax
 * @property string $postal_box
 * @property string $tel
 * @property string $prefix
 * @property string $contact1
 * @property string $contact2
 * @property int $institution_id
 * @property string $email
 * @property string $website
 *
 * @property \App\Model\Entity\Institution $institution
 */
class InstitutionAdress extends Entity
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
