<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PharmacyInstitution Entity
 *
 * @property int $id
 * @property int $institution_id
 * @property string $fullname
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Institution $institution
 * @property \App\Model\Entity\PharmacyOperator[] $pharmacy_operators
 * @property \App\Model\Entity\PharmacyProduct[] $pharmacy_products
 */
class PharmacyInstitution extends Entity
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
