<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $institutionDoctor->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $institutionDoctor->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Institution Doctors'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Institutions'), ['controller' => 'Institutions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Institution'), ['controller' => 'Institutions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Doctors'), ['controller' => 'Doctors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Doctor'), ['controller' => 'Doctors', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Doctor Specialities'), ['controller' => 'DoctorSpecialities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Doctor Speciality'), ['controller' => 'DoctorSpecialities', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="institutionDoctors form large-9 medium-8 columns content">
    <?= $this->Form->create($institutionDoctor) ?>
    <fieldset>
        <legend><?= __('Edit Institution Doctor') ?></legend>
        <?php
            echo $this->Form->input('institution_id', ['options' => $institutions]);
            echo $this->Form->input('doctor_id', ['options' => $doctors]);
            echo $this->Form->input('state');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
