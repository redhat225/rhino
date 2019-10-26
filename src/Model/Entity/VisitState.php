<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VisitState Entity
 *
 * @property int $id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $state_end
 * @property \Cake\I18n\Time $modified
 * @property int $visit_state_type_id
 * @property int $visit_id
 * @property int $visit_level_id
 * @property int $visit_kind_transport_id
 * @property bool $visit_authorized
 *
 * @property \App\Model\Entity\VisitStateType $visit_state_type
 * @property \App\Model\Entity\Visit $visit
 * @property \App\Model\Entity\VisitLevel $visit_level
 * @property \App\Model\Entity\VisitKindTransport $visit_kind_transport
 * @property \App\Model\Entity\VisitStateOrderDetail[] $visit_state_order_details
 */
class VisitState extends Entity
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
