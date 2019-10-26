<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VisitInvoicePayment Entity
 *
 * @property int $id
 * @property float $amount
 * @property int $visit_invoice_id
 * @property int $visit_invoice_payment_method_id
 *
 * @property \App\Model\Entity\VisitInvoice $visit_invoice
 * @property \App\Model\Entity\VisitInvoicePaymentMethod $visit_invoice_payment_method
 */
class VisitInvoicePayment extends Entity
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
