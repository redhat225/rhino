<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ManagerRole Entity
 *
 * @property int $id
 * @property string $label_role
 *
 * @property \App\Model\Entity\ManagerRoleDetail[] $manager_role_details
 */
class ManagerRole extends Entity
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
