<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Patient Antecedent Under Types'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Patient Antecedent Types'), ['controller' => 'PatientAntecedentTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Patient Antecedent Type'), ['controller' => 'PatientAntecedentTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Patient Antecedent Items'), ['controller' => 'PatientAntecedentItems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Patient Antecedent Item'), ['controller' => 'PatientAntecedentItems', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="patientAntecedentUnderTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($patientAntecedentUnderType) ?>
    <fieldset>
        <legend><?= __('Add Patient Antecedent Under Type') ?></legend>
        <?php
            echo $this->Form->input('patient_antecedent_type_id', ['options' => $patientAntecedentTypes]);
            echo $this->Form->input('label_under_type');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
