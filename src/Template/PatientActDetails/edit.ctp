<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $patientActDetail->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $patientActDetail->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Patient Act Details'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Patients'), ['controller' => 'Patients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Patient'), ['controller' => 'Patients', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Patient Acts'), ['controller' => 'PatientActs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Patient Act'), ['controller' => 'PatientActs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="patientActDetails form large-9 medium-8 columns content">
    <?= $this->Form->create($patientActDetail) ?>
    <fieldset>
        <legend><?= __('Edit Patient Act Detail') ?></legend>
        <?php
            echo $this->Form->input('patient_id', ['options' => $patients]);
            echo $this->Form->input('patient_act_id', ['options' => $patientActs]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
