<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Doctor Specialities'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Doctor Speciality Details'), ['controller' => 'DoctorSpecialityDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Doctor Speciality Detail'), ['controller' => 'DoctorSpecialityDetails', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="doctorSpecialities form large-9 medium-8 columns content">
    <?= $this->Form->create($doctorSpeciality) ?>
    <fieldset>
        <legend><?= __('Add Doctor Speciality') ?></legend>
        <?php
            echo $this->Form->input('label_doctor_speciality');
            echo $this->Form->input('doctor_speciality_type_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
