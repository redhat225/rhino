<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ExaminerOperatorAct Entity
 *
 * @property int $id
 * @property string $label_examiner_op_act
 *
 * @property \App\Model\Entity\ExaminerOperatorActDetail[] $examiner_operator_act_details
 */
class ExaminerOperatorAct extends Entity
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
