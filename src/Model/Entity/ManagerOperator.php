<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ManagerOperator Entity
 *
 * @property int $id
 * @property int $people_id
 * @property string $code
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $avatar_manager
 * @property int $institution_id
 *
 * @property \App\Model\Entity\Person $person
 * @property \App\Model\Entity\Institution $institution
 * @property \App\Model\Entity\Visit[] $visits
 * @property \App\Model\Entity\ManagerOperatorActDetail[] $manager_operator_act_details
 * @property \App\Model\Entity\VisitInvoice[] $visit_invoices
 */
class ManagerOperator extends Entity
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
