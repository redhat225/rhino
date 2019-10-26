<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VisitInvoice Entity
 *
 * @property int $id
 * @property int $visit_id
 * @property float $amount
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \Cake\I18n\Time $deleted
 * @property int $visit_invoice_type_id
 * @property int $manager_operator_id
 * @property int $state
 *
 * @property \App\Model\Entity\Visit $visit
 * @property \App\Model\Entity\VisitInvoiceType $visit_invoice_type
 * @property \App\Model\Entity\ManagerOperator $manager_operator
 * @property \App\Model\Entity\VisitInvoiceDetail[] $visit_invoice_details
 * @property \App\Model\Entity\VisitInvoicePayment[] $visit_invoice_payments
 */
class VisitInvoice extends Entity
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
