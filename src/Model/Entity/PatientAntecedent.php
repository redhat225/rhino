<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PatientAntecedent Entity
 *
 * @property int $id
 * @property int $patient_id
 * @property int $patient_antecedent_item_id
 * @property string $scope_antecedent
 * @property int $intensity
 * @property string $antecedent_note
 * @property \Cake\I18n\Time $begin
 * @property \Cake\I18n\Time $end
 *
 * @property \App\Model\Entity\Patient $patient
 * @property \App\Model\Entity\PatientAntecedentType $patient_antecedent_type
 */
class PatientAntecedent extends Entity
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
