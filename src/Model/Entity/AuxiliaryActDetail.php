<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AuxiliaryActDetail Entity
 *
 * @property int $id
 * @property int $auxiliary_id
 * @property int $auxiliary_act_id
 * @property \Cake\I18n\Time $created
 *
 * @property \App\Model\Entity\Auxiliary $auxiliary
 * @property \App\Model\Entity\AuxiliaryAct $auxiliary_act
 */
class AuxiliaryActDetail extends Entity
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
