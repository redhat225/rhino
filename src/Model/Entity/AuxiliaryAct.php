<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AuxiliaryAct Entity
 *
 * @property int $id
 * @property string $label_act
 *
 * @property \App\Model\Entity\AuxiliaryActDetail[] $auxiliary_act_details
 */
class AuxiliaryAct extends Entity
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
