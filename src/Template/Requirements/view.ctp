<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Requirement'), ['action' => 'edit', $requirement->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Requirement'), ['action' => 'delete', $requirement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requirement->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Requirements'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Requirement'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Requirement Compositions'), ['controller' => 'RequirementCompositions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Requirement Composition'), ['controller' => 'RequirementCompositions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Requirement Holder Details'), ['controller' => 'RequirementHolderDetails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Requirement Holder Detail'), ['controller' => 'RequirementHolderDetails', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Requirement Issue Lists'), ['controller' => 'RequirementIssueLists', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Requirement Issue List'), ['controller' => 'RequirementIssueLists', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Requirement Presentations'), ['controller' => 'RequirementPresentations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Requirement Presentation'), ['controller' => 'RequirementPresentations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Requirement Route Administrations'), ['controller' => 'RequirementRouteAdministrations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Requirement Route Administration'), ['controller' => 'RequirementRouteAdministrations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Requirement Significant Informations'), ['controller' => 'RequirementSignificantInformations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Requirement Significant Information'), ['controller' => 'RequirementSignificantInformations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Treatment Requirements'), ['controller' => 'TreatmentRequirements', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Treatment Requirement'), ['controller' => 'TreatmentRequirements', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="requirements view large-9 medium-8 columns content">
    <h3><?= h($requirement->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Requirement Denomination') ?></th>
            <td><?= h($requirement->requirement_denomination) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Requirement Dmp Code') ?></th>
            <td><?= h($requirement->requirement_dmp_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Requirement Pharma Form') ?></th>
            <td><?= h($requirement->requirement_pharma_form) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Requirement Status') ?></th>
            <td><?= h($requirement->requirement_status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Requirement Authorization Number') ?></th>
            <td><?= h($requirement->requirement_authorization_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($requirement->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Requirement Date Auth Selling') ?></th>
            <td><?= h($requirement->requirement_date_auth_selling) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Requirement Homeopathic') ?></th>
            <td><?= $requirement->requirement_homeopathic ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Requirement Security') ?></th>
            <td><?= $requirement->requirement_security ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Requirement State Selling') ?></th>
            <td><?= $requirement->requirement_state_selling ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Requirement Therapeutic Indication') ?></h4>
        <?= $this->Text->autoParagraph(h($requirement->requirement_therapeutic_indication)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Requirement Compositions') ?></h4>
        <?php if (!empty($requirement->requirement_compositions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Composition Dosage Reference') ?></th>
                <th scope="col"><?= __('Composition Pharma Designation') ?></th>
                <th scope="col"><?= __('Requirement Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($requirement->requirement_compositions as $requirementCompositions): ?>
            <tr>
                <td><?= h($requirementCompositions->id) ?></td>
                <td><?= h($requirementCompositions->composition_dosage_reference) ?></td>
                <td><?= h($requirementCompositions->composition_pharma_designation) ?></td>
                <td><?= h($requirementCompositions->requirement_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'RequirementCompositions', 'action' => 'view', $requirementCompositions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'RequirementCompositions', 'action' => 'edit', $requirementCompositions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'RequirementCompositions', 'action' => 'delete', $requirementCompositions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requirementCompositions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Requirement Holder Details') ?></h4>
        <?php if (!empty($requirement->requirement_holder_details)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Requirement Holder Id') ?></th>
                <th scope="col"><?= __('Requirement Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($requirement->requirement_holder_details as $requirementHolderDetails): ?>
            <tr>
                <td><?= h($requirementHolderDetails->id) ?></td>
                <td><?= h($requirementHolderDetails->requirement_holder_id) ?></td>
                <td><?= h($requirementHolderDetails->requirement_id) ?></td>
                <td><?= h($requirementHolderDetails->created) ?></td>
                <td><?= h($requirementHolderDetails->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'RequirementHolderDetails', 'action' => 'view', $requirementHolderDetails->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'RequirementHolderDetails', 'action' => 'edit', $requirementHolderDetails->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'RequirementHolderDetails', 'action' => 'delete', $requirementHolderDetails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requirementHolderDetails->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Requirement Issue Lists') ?></h4>
        <?php if (!empty($requirement->requirement_issue_lists)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('List Decsription') ?></th>
                <th scope="col"><?= __('Requirement Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($requirement->requirement_issue_lists as $requirementIssueLists): ?>
            <tr>
                <td><?= h($requirementIssueLists->id) ?></td>
                <td><?= h($requirementIssueLists->list_decsription) ?></td>
                <td><?= h($requirementIssueLists->requirement_id) ?></td>
                <td><?= h($requirementIssueLists->created) ?></td>
                <td><?= h($requirementIssueLists->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'RequirementIssueLists', 'action' => 'view', $requirementIssueLists->]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'RequirementIssueLists', 'action' => 'edit', $requirementIssueLists->]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'RequirementIssueLists', 'action' => 'delete', $requirementIssueLists->], ['confirm' => __('Are you sure you want to delete # {0}?', $requirementIssueLists->)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Requirement Presentations') ?></h4>
        <?php if (!empty($requirement->requirement_presentations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Presentation Description') ?></th>
                <th scope="col"><?= __('Requirement Id') ?></th>
                <th scope="col"><?= __('Presentation Code') ?></th>
                <th scope="col"><?= __('Presentation Administration Status') ?></th>
                <th scope="col"><?= __('Presentation Administration State') ?></th>
                <th scope="col"><?= __('Presentation Administration Date') ?></th>
                <th scope="col"><?= __('Presentation Price') ?></th>
                <th scope="col"><?= __('Presentation Renewal Indications') ?></th>
                <th scope="col"><?= __('Presentation Agreement') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($requirement->requirement_presentations as $requirementPresentations): ?>
            <tr>
                <td><?= h($requirementPresentations->id) ?></td>
                <td><?= h($requirementPresentations->presentation_description) ?></td>
                <td><?= h($requirementPresentations->requirement_id) ?></td>
                <td><?= h($requirementPresentations->presentation_code) ?></td>
                <td><?= h($requirementPresentations->presentation_administration_status) ?></td>
                <td><?= h($requirementPresentations->presentation_administration_state) ?></td>
                <td><?= h($requirementPresentations->presentation_administration_date) ?></td>
                <td><?= h($requirementPresentations->presentation_price) ?></td>
                <td><?= h($requirementPresentations->presentation_renewal_indications) ?></td>
                <td><?= h($requirementPresentations->presentation_agreement) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'RequirementPresentations', 'action' => 'view', $requirementPresentations->]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'RequirementPresentations', 'action' => 'edit', $requirementPresentations->]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'RequirementPresentations', 'action' => 'delete', $requirementPresentations->], ['confirm' => __('Are you sure you want to delete # {0}?', $requirementPresentations->)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Requirement Route Administrations') ?></h4>
        <?php if (!empty($requirement->requirement_route_administrations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Requirement Route Administration Type Id') ?></th>
                <th scope="col"><?= __('Requirement Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($requirement->requirement_route_administrations as $requirementRouteAdministrations): ?>
            <tr>
                <td><?= h($requirementRouteAdministrations->id) ?></td>
                <td><?= h($requirementRouteAdministrations->requirement_route_administration_type_id) ?></td>
                <td><?= h($requirementRouteAdministrations->requirement_id) ?></td>
                <td><?= h($requirementRouteAdministrations->created) ?></td>
                <td><?= h($requirementRouteAdministrations->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'RequirementRouteAdministrations', 'action' => 'view', $requirementRouteAdministrations->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'RequirementRouteAdministrations', 'action' => 'edit', $requirementRouteAdministrations->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'RequirementRouteAdministrations', 'action' => 'delete', $requirementRouteAdministrations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requirementRouteAdministrations->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Requirement Significant Informations') ?></h4>
        <?php if (!empty($requirement->requirement_significant_informations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Begin') ?></th>
                <th scope="col"><?= __('End') ?></th>
                <th scope="col"><?= __('Information Label') ?></th>
                <th scope="col"><?= __('Information Url') ?></th>
                <th scope="col"><?= __('Requirement Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($requirement->requirement_significant_informations as $requirementSignificantInformations): ?>
            <tr>
                <td><?= h($requirementSignificantInformations->id) ?></td>
                <td><?= h($requirementSignificantInformations->begin) ?></td>
                <td><?= h($requirementSignificantInformations->end) ?></td>
                <td><?= h($requirementSignificantInformations->information_label) ?></td>
                <td><?= h($requirementSignificantInformations->information_url) ?></td>
                <td><?= h($requirementSignificantInformations->requirement_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'RequirementSignificantInformations', 'action' => 'view', $requirementSignificantInformations->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'RequirementSignificantInformations', 'action' => 'edit', $requirementSignificantInformations->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'RequirementSignificantInformations', 'action' => 'delete', $requirementSignificantInformations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requirementSignificantInformations->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Treatment Requirements') ?></h4>
        <?php if (!empty($requirement->treatment_requirements)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Label Requirement') ?></th>
                <th scope="col"><?= __('Requirement Cis Code') ?></th>
                <th scope="col"><?= __('Requirement Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Treatment Id') ?></th>
                <th scope="col"><?= __('Requirement Duration') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($requirement->treatment_requirements as $treatmentRequirements): ?>
            <tr>
                <td><?= h($treatmentRequirements->id) ?></td>
                <td><?= h($treatmentRequirements->label_requirement) ?></td>
                <td><?= h($treatmentRequirements->requirement_cis_code) ?></td>
                <td><?= h($treatmentRequirements->requirement_id) ?></td>
                <td><?= h($treatmentRequirements->created) ?></td>
                <td><?= h($treatmentRequirements->modified) ?></td>
                <td><?= h($treatmentRequirements->treatment_id) ?></td>
                <td><?= h($treatmentRequirements->requirement_duration) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'TreatmentRequirements', 'action' => 'view', $treatmentRequirements->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'TreatmentRequirements', 'action' => 'edit', $treatmentRequirements->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'TreatmentRequirements', 'action' => 'delete', $treatmentRequirements->id], ['confirm' => __('Are you sure you want to delete # {0}?', $treatmentRequirements->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
