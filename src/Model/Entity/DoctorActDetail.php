<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DoctorActDetail Entity
 *
 * @property int $id
 * @property int $doctor_id
 * @property int $doctor_act_id
 * @property \Cake\I18n\Time $created
 *
 * @property \App\Model\Entity\Doctor $doctor
 * @property \App\Model\Entity\DoctorAct $doctor_act
 */
class DoctorActDetail extends Entity
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
