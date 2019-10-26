<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RequirementComposition Entity
 *
 * @property int $id
 * @property string $composition_dosage_reference
 * @property string $composition_pharma_designation
 * @property int $requirement_id
 *
 * @property \App\Model\Entity\Requirement $requirement
 * @property \App\Model\Entity\RequirementIngredientFraction[] $requirement_ingredient_fractions
 * @property \App\Model\Entity\RequirementLinkedActiveIngredient[] $requirement_linked_active_ingredients
 */
class RequirementComposition extends Entity
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
