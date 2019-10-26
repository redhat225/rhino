<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $treatmentRequirementRenewal->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $treatmentRequirementRenewal->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Treatment Requirement Renewals'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Treatment Requirements'), ['controller' => 'TreatmentRequirements', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Treatment Requirement'), ['controller' => 'TreatmentRequirements', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="treatmentRequirementRenewals form large-9 medium-8 columns content">
    <?= $this->Form->create($treatmentRequirementRenewal) ?>
    <fieldset>
        <legend><?= __('Edit Treatment Requirement Renewal') ?></legend>
        <?php
            echo $this->Form->input('treatment_requirement_id', ['options' => $treatmentRequirements]);
            echo $this->Form->input('renewal_duration');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
