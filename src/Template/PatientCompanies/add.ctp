<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Patient Companies'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Patient Company Details'), ['controller' => 'PatientCompanyDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Patient Company Detail'), ['controller' => 'PatientCompanyDetails', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="patientCompanies form large-9 medium-8 columns content">
    <?= $this->Form->create($patientCompany) ?>
    <fieldset>
        <legend><?= __('Add Patient Company') ?></legend>
        <?php
            echo $this->Form->input('label_patient_company');
            echo $this->Form->input('contact1');
            echo $this->Form->input('contact2');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
