<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Auxiliary Entity
 *
 * @property int $id
 * @property string $code
 * @property string $username
 * @property string $password
 * @property int $people_id
 * @property string $email
 * @property string $avatar_auxiliary
 *
 * @property \App\Model\Entity\Person $person
 * @property \App\Model\Entity\AuxiliaryActDetail[] $auxiliary_act_details
 * @property \App\Model\Entity\AuxiliaryRoleDetail[] $auxiliary_role_details
 * @property \App\Model\Entity\VisitConstant[] $visit_constants
 * @property \App\Model\Entity\VisitInterventionAuxiliary[] $visit_intervention_auxiliaries
 * @property \App\Model\Entity\VisitTask[] $visit_tasks
 */
class Auxiliary extends Entity
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
