<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VisitStateOrderType Entity
 *
 * @property int $id
 * @property string $label_order_type
 *
 * @property \App\Model\Entity\VisitStateOrderDetail[] $visit_state_order_details
 */
class VisitStateOrderType extends Entity
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
