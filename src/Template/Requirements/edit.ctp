<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $requirement->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $requirement->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Requirements'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Requirement Compositions'), ['controller' => 'RequirementCompositions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Requirement Composition'), ['controller' => 'RequirementCompositions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Requirement Holder Details'), ['controller' => 'RequirementHolderDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Requirement Holder Detail'), ['controller' => 'RequirementHolderDetails', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Requirement Issue Lists'), ['controller' => 'RequirementIssueLists', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Requirement Issue List'), ['controller' => 'RequirementIssueLists', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Requirement Presentations'), ['controller' => 'RequirementPresentations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Requirement Presentation'), ['controller' => 'RequirementPresentations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Requirement Route Administrations'), ['controller' => 'RequirementRouteAdministrations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Requirement Route Administration'), ['controller' => 'RequirementRouteAdministrations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Requirement Significant Informations'), ['controller' => 'RequirementSignificantInformations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Requirement Significant Information'), ['controller' => 'RequirementSignificantInformations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Treatment Requirements'), ['controller' => 'TreatmentRequirements', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Treatment Requirement'), ['controller' => 'TreatmentRequirements', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="requirements form large-9 medium-8 columns content">
    <?= $this->Form->create($requirement) ?>
    <fieldset>
        <legend><?= __('Edit Requirement') ?></legend>
        <?php
            echo $this->Form->input('requirement_denomination');
            echo $this->Form->input('requirement_dmp_code');
            echo $this->Form->input('requirement_pharma_form');
            echo $this->Form->input('requirement_homeopathic');
            echo $this->Form->input('requirement_therapeutic_indication');
            echo $this->Form->input('requirement_security');
            echo $this->Form->input('requirement_state_selling');
            echo $this->Form->input('requirement_status');
            echo $this->Form->input('requirement_authorization_number');
            echo $this->Form->input('requirement_date_auth_selling', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
