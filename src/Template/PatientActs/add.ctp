<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Patient Acts'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Patient Act Details'), ['controller' => 'PatientActDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Patient Act Detail'), ['controller' => 'PatientActDetails', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="patientActs form large-9 medium-8 columns content">
    <?= $this->Form->create($patientAct) ?>
    <fieldset>
        <legend><?= __('Add Patient Act') ?></legend>
        <?php
            echo $this->Form->input('label_patient_act');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
