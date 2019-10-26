<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PharmacyInvoice Entity
 *
 * @property int $id
 * @property string $code
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $details
 * @property int $pharmacy_operator_id
 * @property int $pharmacy_customer_id
 *
 * @property \App\Model\Entity\PharmacyOperator $pharmacy_operator
 * @property \App\Model\Entity\PharmacyCustomer $pharmacy_customer
 * @property \App\Model\Entity\PharmacyInvoiceDetail[] $pharmacy_invoice_details
 * @property \App\Model\Entity\PharmacyPayment[] $pharmacy_payments
 */
class PharmacyInvoice extends Entity
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
