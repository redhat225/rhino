<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Requirement Entity
 *
 * @property int $id
 * @property string $requirement_denomination
 * @property string $requirement_dmp_code
 * @property string $requirement_pharma_form
 * @property bool $requirement_homeopathic
 * @property string $requirement_therapeutic_indication
 * @property bool $requirement_security
 * @property bool $requirement_state_selling
 * @property string $requirement_status
 * @property string $requirement_authorization_number
 * @property \Cake\I18n\Time $requirement_date_auth_selling
 *
 * @property \App\Model\Entity\RequirementComposition[] $requirement_compositions
 * @property \App\Model\Entity\RequirementHolderDetail[] $requirement_holder_details
 * @property \App\Model\Entity\RequirementIssueList[] $requirement_issue_lists
 * @property \App\Model\Entity\RequirementPresentation[] $requirement_presentations
 * @property \App\Model\Entity\RequirementRouteAdministration[] $requirement_route_administrations
 * @property \App\Model\Entity\RequirementSignificantInformation[] $requirement_significant_informations
 * @property \App\Model\Entity\TreatmentRequirement[] $treatment_requirements
 */
class Requirement extends Entity
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
