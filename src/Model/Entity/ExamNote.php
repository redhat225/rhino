<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ExamNote Entity
 *
 * @property int $id
 * @property int $exam_id
 * @property string $content_note
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property int $exam_evidence_id
 *
 * @property \App\Model\Entity\Exam $exam
 */
class ExamNote extends Entity
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
