<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Institution Entity
 *
 * @property int $id
 * @property string $fullname
 * @property string $institution_quarter
 * @property string $institution_quarter_extra
 * @property string $additional_info
 * @property string $institution_greeting
 * @property string $slug
 * @property int $institution_type_id
 * @property int $country_township_id
 * @property \Cake\I18n\Time $created
 * @property string $logo_institution
 *
 * @property \App\Model\Entity\InstitutionType $institution_type
 * @property \App\Model\Entity\InstitutionArea $institution_area
 * @property \App\Model\Entity\ExaminerInstitution[] $examiner_institutions
 * @property \App\Model\Entity\InstitutionAdress $institution_adress
 * @property \App\Model\Entity\ManagerOperator[] $manager_operators
 * @property \App\Model\Entity\PharmacyInstitution[] $pharmacy_institutions
 */
class Institution extends Entity
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
