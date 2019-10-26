<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Treatment Requirement Specifications'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Treatment Requirements'), ['controller' => 'TreatmentRequirements', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Treatment Requirement'), ['controller' => 'TreatmentRequirements', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="treatmentRequirementSpecifications form large-9 medium-8 columns content">
    <?= $this->Form->create($treatmentRequirementSpecification) ?>
    <fieldset>
        <legend><?= __('Add Treatment Requirement Specification') ?></legend>
        <?php
            echo $this->Form->input('treatment_requirement_id', ['options' => $treatmentRequirements]);
            echo $this->Form->input('specification_route');
            echo $this->Form->input('specification_dosage');
            echo $this->Form->input('specification_frequency');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
