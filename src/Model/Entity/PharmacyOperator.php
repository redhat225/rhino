<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PharmacyOperator Entity
 *
 * @property int $id
 * @property string $code
 * @property string $username
 * @property string $password
 * @property int $people_id
 * @property int $pharmacy_institution_id
 * @property int $pharmacy_role_id
 * @property string $avatar
 * @property string $email
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Person $person
 * @property \App\Model\Entity\PharmacyInstitution $pharmacy_institution
 * @property \App\Model\Entity\PharmacyRole $pharmacy_role
 * @property \App\Model\Entity\PharmacyInvoice[] $pharmacy_invoices
 */
class PharmacyOperator extends Entity
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
