<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ExamEvidence Entity
 *
 * @property int $id
 * @property int $exam_id
 * @property string $path_evidence
 *
 * @property \App\Model\Entity\Exam $exam
 */
class ExamEvidence extends Entity
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
