<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VisitStateOrderDetail Entity
 *
 * @property int $id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property string $path_order_details
 * @property int $visit_state_id
 * @property int $visit_state_order_type_id
 * @property string $additional_details
 * @property string $created_by
 *
 * @property \App\Model\Entity\VisitState $visit_state
 * @property \App\Model\Entity\VisitStateOrderType $visit_state_order_type
 */
class VisitStateOrderDetail extends Entity
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
