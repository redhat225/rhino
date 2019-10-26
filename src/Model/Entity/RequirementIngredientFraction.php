<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RequirementIngredientFraction Entity
 *
 * @property int $id
 * @property int $requirement_active_fraction_id
 * @property int $requirement_active_ingredient_id
 * @property int $requirement_composition_id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property int $requirement_active_fraction_dosage
 * @property string $requirement_active_fraction_dosage_unity
 *
 * @property \App\Model\Entity\RequirementActiveFraction $requirement_active_fraction
 * @property \App\Model\Entity\RequirementActiveIngredient $requirement_active_ingredient
 * @property \App\Model\Entity\RequirementComposition $requirement_composition
 */
class RequirementIngredientFraction extends Entity
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
