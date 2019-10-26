<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PatientInsurance Entity
 *
 * @property int $id
 * @property string $number_card
 * @property int $patient_insurer_id
 * @property int $patient_id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \Cake\I18n\Time $deleted
 * @property \Cake\I18n\Time $expired_insurance_date
 *
 * @property \App\Model\Entity\PatientInsurer $patient_insurer
 */
class PatientInsurance extends Entity
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
