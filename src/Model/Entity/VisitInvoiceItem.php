<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VisitInvoiceItem Entity
 *
 * @property int $id
 * @property string $label_item
 * @property int $visit_invoice_item_category_id
 * @property int $institution_id
 *
 * @property \App\Model\Entity\VisitInvoiceItemCategory $visit_invoice_item_category
 * @property \App\Model\Entity\Institution $institution
 * @property \App\Model\Entity\VisitInvoiceDetail[] $visit_invoice_details
 */
class VisitInvoiceItem extends Entity
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
