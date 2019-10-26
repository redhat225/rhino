<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $patientSchedule->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $patientSchedule->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Patient Schedules'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Patients'), ['controller' => 'Patients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Patient'), ['controller' => 'Patients', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="patientSchedules form large-9 medium-8 columns content">
    <?= $this->Form->create($patientSchedule) ?>
    <fieldset>
        <legend><?= __('Edit Patient Schedule') ?></legend>
        <?php
            echo $this->Form->input('patient_id', ['options' => $patients]);
            echo $this->Form->input('schedule_content');
            echo $this->Form->input('schedule_type');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
