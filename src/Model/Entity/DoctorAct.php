<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DoctorAct Entity
 *
 * @property int $id
 * @property string $label_doctor_act
 *
 * @property \App\Model\Entity\DoctorActDetail[] $doctor_act_details
 */
class DoctorAct extends Entity
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
