<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Doctor Entity
 *
 * @property int $id
 * @property int $people_id
 * @property string $username
 * @property string $password
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property string $email
 * @property string $code
 * @property string $avatar_doctor
 *
 * @property \App\Model\Entity\Person $person
 * @property \App\Model\Entity\DiaryToken[] $diary_tokens
 * @property \App\Model\Entity\DoctorSpecialityDetail[] $doctor_speciality_details
 * @property \App\Model\Entity\VisitMeeting[] $visit_meetings
 * @property \App\Model\Entity\Visit[] $visits
 */
class Doctor extends Entity
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
