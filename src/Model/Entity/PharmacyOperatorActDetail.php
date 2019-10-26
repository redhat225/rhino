<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PharmacyOperatorActDetail Entity
 *
 * @property int $id
 * @property int $pharmacy_operator_act_id
 * @property int $pharmacy_operator_id
 * @property \Cake\I18n\Time $created
 *
 * @property \App\Model\Entity\PharmacyOperatorAct $pharmacy_operator_act
 * @property \App\Model\Entity\PharmacyOperator $pharmacy_operator
 */
class PharmacyOperatorActDetail extends Entity
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
