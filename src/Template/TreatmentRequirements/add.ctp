<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Treatment Requirements'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Treatments'), ['controller' => 'Treatments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Treatment'), ['controller' => 'Treatments', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="treatmentRequirements form large-9 medium-8 columns content">
    <?= $this->Form->create($treatmentRequirement) ?>
    <fieldset>
        <legend><?= __('Add Treatment Requirement') ?></legend>
        <?php
            echo $this->Form->input('label_requirement');
            echo $this->Form->input('requirement_cis_code');
            echo $this->Form->input('requirement_id');
            echo $this->Form->input('treatment_id', ['options' => $treatments]);
            echo $this->Form->input('requirement_duration');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
