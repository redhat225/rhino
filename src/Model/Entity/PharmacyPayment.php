<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PharmacyPayment Entity
 *
 * @property int $id
 * @property string $code
 * @property float $amount
 * @property int $pharmacy_payment_method_id
 * @property int $pharmacy_invoice_id
 * @property \Cake\I18n\Time $created
 *
 * @property \App\Model\Entity\PharmacyPaymentMethod $pharmacy_payment_method
 * @property \App\Model\Entity\PharmacyInvoice $pharmacy_invoice
 */
class PharmacyPayment extends Entity
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
