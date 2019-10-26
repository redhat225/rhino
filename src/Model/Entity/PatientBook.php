<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PatientBook Entity
 *
 * @property int $id
 * @property int $patient_id
 * @property string $book_path
 * @property int $changed
 *
 * @property \App\Model\Entity\Patient $patient
 */
class PatientBook extends Entity
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
