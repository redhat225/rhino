<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ExaminerOperator Entity
 *
 * @property int $id
 * @property string $code
 * @property string $username
 * @property string $password
 * @property string $email
 * @property int $people_id
 * @property int $examiner_institution_id
 * @property string $avatar_examiner
 *
 * @property \App\Model\Entity\Person $person
 * @property \App\Model\Entity\ExaminerOperatorActDetail[] $examiner_operator_act_details
 */
class ExaminerOperator extends Entity
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
