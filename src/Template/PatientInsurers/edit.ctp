<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $patientInsurer->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $patientInsurer->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Patient Insurers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Patient Insurances'), ['controller' => 'PatientInsurances', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Patient Insurance'), ['controller' => 'PatientInsurances', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="patientInsurers form large-9 medium-8 columns content">
    <?= $this->Form->create($patientInsurer) ?>
    <fieldset>
        <legend><?= __('Edit Patient Insurer') ?></legend>
        <?php
            echo $this->Form->input('label');
            echo $this->Form->input('logo_insurance');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
