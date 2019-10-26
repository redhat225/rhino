<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ManagerOperatorAct Entity
 *
 * @property int $id
 * @property string $label_manager_op_act
 *
 * @property \App\Model\Entity\ManagerOperatorActDetail[] $manager_operator_act_details
 */
class ManagerOperatorAct extends Entity
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
