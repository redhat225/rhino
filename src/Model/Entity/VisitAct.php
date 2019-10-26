<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VisitAct Entity
 *
 * @property int $id
 * @property string $label
 * @property int $visit_act_sub_category_id
 *
 * @property \App\Model\Entity\VisitActSubCategory $visit_act_sub_category
 * @property \App\Model\Entity\VisitActAuxiliaryDetail[] $visit_act_auxiliary_details
 * @property \App\Model\Entity\VisitActDoctorDetail[] $visit_act_doctor_details
 */
class VisitAct extends Entity
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
