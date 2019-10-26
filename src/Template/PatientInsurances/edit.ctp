<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $patientInsurance->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $patientInsurance->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Patient Insurances'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Patient Insurers'), ['controller' => 'PatientInsurers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Patient Insurer'), ['controller' => 'PatientInsurers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="patientInsurances form large-9 medium-8 columns content">
    <?= $this->Form->create($patientInsurance) ?>
    <fieldset>
        <legend><?= __('Edit Patient Insurance') ?></legend>
        <?php
            echo $this->Form->input('number_card');
            echo $this->Form->input('patient_insurer_id', ['options' => $patientInsurers]);
            echo $this->Form->input('patient_id');
            echo $this->Form->input('deleted', ['empty' => true]);
            echo $this->Form->input('expired_insurance_date');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
