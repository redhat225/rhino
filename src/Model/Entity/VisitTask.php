<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VisitTask Entity
 *
 * @property int $id
 * @property string $content_task
 * @property int $visit_id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property int $manager_operator_id
 * @property int $doctor_id
 * @property int $auxiliary_id
 *
 * @property \App\Model\Entity\Visit $visit
 * @property \App\Model\Entity\ManagerOperator $manager_operator
 * @property \App\Model\Entity\Doctor $doctor
 * @property \App\Model\Entity\Auxiliary $auxiliary
 */
class VisitTask extends Entity
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
