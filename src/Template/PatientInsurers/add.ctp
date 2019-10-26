<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Patient Insurers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Patient Insurances'), ['controller' => 'PatientInsurances', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Patient Insurance'), ['controller' => 'PatientInsurances', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="patientInsurers form large-9 medium-8 columns content">
    <?= $this->Form->create($patientInsurer) ?>
    <fieldset>
        <legend><?= __('Add Patient Insurer') ?></legend>
        <?php
            echo $this->Form->input('label');
            echo $this->Form->input('logo_insurance');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
