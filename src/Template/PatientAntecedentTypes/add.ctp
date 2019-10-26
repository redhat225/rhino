<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Patient Antecedent Types'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Patient Antecedent Under Types'), ['controller' => 'PatientAntecedentUnderTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Patient Antecedent Under Type'), ['controller' => 'PatientAntecedentUnderTypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="patientAntecedentTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($patientAntecedentType) ?>
    <fieldset>
        <legend><?= __('Add Patient Antecedent Type') ?></legend>
        <?php
            echo $this->Form->input('label_antecedent_type');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
