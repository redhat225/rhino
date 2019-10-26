<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ExamUnderType Entity
 *
 * @property int $id
 * @property int $exam_type_id
 * @property string $label_exam_under_type
 * @property string $template_exam
 *
 * @property \App\Model\Entity\ExamType $exam_type
 */
class ExamUnderType extends Entity
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
