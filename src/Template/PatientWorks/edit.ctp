<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $patientWork->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $patientWork->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Patient Works'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Patients'), ['controller' => 'Patients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Patient'), ['controller' => 'Patients', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="patientWorks form large-9 medium-8 columns content">
    <?= $this->Form->create($patientWork) ?>
    <fieldset>
        <legend><?= __('Edit Patient Work') ?></legend>
        <?php
            echo $this->Form->input('patient_id', ['options' => $patients]);
            echo $this->Form->input('work_label');
            echo $this->Form->input('work_company');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
