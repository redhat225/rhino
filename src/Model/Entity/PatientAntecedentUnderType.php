<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PatientAntecedentUnderType Entity
 *
 * @property int $id
 * @property int $patient_antecedent_type_id
 * @property string $label_under_type
 *
 * @property \App\Model\Entity\PatientAntecedentType $patient_antecedent_type
 * @property \App\Model\Entity\PatientAntecedentItem[] $patient_antecedent_items
 */
class PatientAntecedentUnderType extends Entity
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
