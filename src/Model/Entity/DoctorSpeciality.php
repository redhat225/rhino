<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DoctorSpeciality Entity
 *
 * @property int $id
 * @property int $visit_speciality_id
 * @property int $institution_doctor_id
 *
 * @property \App\Model\Entity\Doctor $doctor
 * @property \App\Model\Entity\InstitutionDoctor $institution_doctor
 */
class DoctorSpeciality extends Entity
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
