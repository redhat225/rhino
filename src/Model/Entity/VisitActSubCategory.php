<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VisitActSubCategory Entity
 *
 * @property int $id
 * @property int $visit_act_category_id
 * @property string $label_sub_category
 *
 * @property \App\Model\Entity\VisitActCategory $visit_act_category
 * @property \App\Model\Entity\VisitAct[] $visit_acts
 */
class VisitActSubCategory extends Entity
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
