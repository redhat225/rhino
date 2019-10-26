<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PharmacyStoreProductLevel Entity
 *
 * @property int $id
 * @property int $qty
 * @property int $pharmacy_store_product_id
 * @property \Cake\I18n\Time $created
 * @property int $ref_order
 *
 * @property \App\Model\Entity\PharmacyStoreProduct $pharmacy_store_product
 */
class PharmacyStoreProductLevel extends Entity
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
