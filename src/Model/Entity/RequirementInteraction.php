<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RequirementInteraction Entity
 *
 * @property int $id
 * @property int $requirement_active_ingredient_id
 * @property string $interaction_family_name_1
 * @property int $interaction_family_1_id
 * @property string $interaction_family_name_2
 * @property int $interaction_family_2_id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\RequirementActiveIngredient $requirement_active_ingredient
 * @property \App\Model\Entity\InteractionFamily1 $interaction_family1
 * @property \App\Model\Entity\InteractionFamily2 $interaction_family2
 */
class RequirementInteraction extends Entity
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
