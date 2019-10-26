<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Patient Entity
 *
 * @property int $id
 * @property string $code
 * @property int $people_id
 * @property string $username
 * @property string $password
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property string $email
 * @property string $avatar_patient
 *
 * @property \App\Model\Entity\Person $person
 * @property \App\Model\Entity\DiaryToken[] $diary_tokens
 * @property \App\Model\Entity\PatientAntecedent[] $patient_antecedents
 * @property \App\Model\Entity\PatientBook[] $patient_books
 * @property \App\Model\Entity\PatientCompanyDetail[] $patient_company_details
 * @property \App\Model\Entity\VisitMeeting[] $visit_meetings
 * @property \App\Model\Entity\Visit[] $visits
 */
class Patient extends Entity
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

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
}
