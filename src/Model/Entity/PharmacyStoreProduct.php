<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PharmacyStoreProduct Entity
 *
 * @property int $id
 * @property string $code
 * @property int $pharmacy_product_id
 * @property int $qty
 * @property float $unit_price
 * @property \Cake\I18n\Time $expiry_date
 * @property int $reorder_level
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property int $created_by
 * @property int $modified_by
 * @property \Cake\I18n\Time $deleted
 *
 * @property \App\Model\Entity\PharmacyProduct $pharmacy_product
 * @property \App\Model\Entity\PharmacyInvoiceDetail[] $pharmacy_invoice_details
 * @property \App\Model\Entity\PharmacyStoreProductLevel[] $pharmacy_store_product_levels
 */
class PharmacyStoreProduct extends Entity
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
