<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $patientCompanyDetail->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $patientCompanyDetail->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Patient Company Details'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Patients'), ['controller' => 'Patients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Patient'), ['controller' => 'Patients', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Patient Companies'), ['controller' => 'PatientCompanies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Patient Company'), ['controller' => 'PatientCompanies', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="patientCompanyDetails form large-9 medium-8 columns content">
    <?= $this->Form->create($patientCompanyDetail) ?>
    <fieldset>
        <legend><?= __('Edit Patient Company Detail') ?></legend>
        <?php
            echo $this->Form->input('patient_id', ['options' => $patients]);
            echo $this->Form->input('patient_company_id', ['options' => $patientCompanies]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
