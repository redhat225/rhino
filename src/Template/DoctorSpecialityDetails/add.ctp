<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Doctor Speciality Details'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Doctor Specialities'), ['controller' => 'DoctorSpecialities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Doctor Speciality'), ['controller' => 'DoctorSpecialities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Doctors'), ['controller' => 'Doctors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Doctor'), ['controller' => 'Doctors', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="doctorSpecialityDetails form large-9 medium-8 columns content">
    <?= $this->Form->create($doctorSpecialityDetail) ?>
    <fieldset>
        <legend><?= __('Add Doctor Speciality Detail') ?></legend>
        <?php
            echo $this->Form->input('doctor_speciality_id', ['options' => $doctorSpecialities]);
            echo $this->Form->input('doctor_id', ['options' => $doctors]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
