<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VisitInvoicePaymentSchedule Entity
 *
 * @property int $id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $expected_date
 * @property int $visit_invoice_payment_id
 *
 * @property \App\Model\Entity\VisitInvoicePayment $visit_invoice_payment
 */
class VisitInvoicePaymentSchedule extends Entity
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
