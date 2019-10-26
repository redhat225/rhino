<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PharmacyProduct Entity
 *
 * @property int $id
 * @property string $name
 * @property string $alias
 * @property string $details
 * @property string $picture
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $deleted
 * @property \Cake\I18n\Time $modified
 * @property int $created_by
 * @property int $updated_by
 * @property int $pharmacy_product_category_id
 * @property int $pharmacy_institution_id
 *
 * @property \App\Model\Entity\PharmacyProductCategory $pharmacy_product_category
 * @property \App\Model\Entity\PharmacyInstitution $pharmacy_institution
 * @property \App\Model\Entity\PharmacyProductPrice[] $pharmacy_product_prices
 * @property \App\Model\Entity\PharmacyStoreProduct[] $pharmacy_store_products
 */
class PharmacyProduct extends Entity
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
