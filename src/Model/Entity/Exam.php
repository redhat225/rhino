<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Exam Entity
 *
 * @property int $id
 * @property int $visit_meeting_id
 * @property string $obs_exam
 * @property int $exam_under_type_id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property string $result_exam
 * @property int $codexam
 *
 * @property \App\Model\Entity\VisitMeeting $visit_meeting
 * @property \App\Model\Entity\ExamType $exam_type
 * @property \App\Model\Entity\ExamEvidence[] $exam_evidences
 * @property \App\Model\Entity\ExamNote[] $exam_notes
 */
class Exam extends Entity
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
