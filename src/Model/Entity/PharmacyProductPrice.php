<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PharmacyProductPrice Entity
 *
 * @property int $id
 * @property float $unit_price
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property int $created_by
 * @property int $modified_by
 * @property int $pharmacy_product_id
 *
 * @property \App\Model\Entity\PharmacyProduct $pharmacy_product
 */
class PharmacyProductPrice extends Entity
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
