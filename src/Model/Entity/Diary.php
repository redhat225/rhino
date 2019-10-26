<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Diary Entity
 *
 * @property int $id
 * @property int $diary_token_id
 * @property int $doctor_id
 * @property int $diary_type_id
 * @property \Cake\I18n\Time $created
 * @property string $diary_content
 *
 * @property \App\Model\Entity\DiaryToken $diary_token
 * @property \App\Model\Entity\DiaryType $diary_type
 */
class Diary extends Entity
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
