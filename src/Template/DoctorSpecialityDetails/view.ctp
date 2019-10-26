<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Doctor Speciality Detail'), ['action' => 'edit', $doctorSpecialityDetail->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Doctor Speciality Detail'), ['action' => 'delete', $doctorSpecialityDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $doctorSpecialityDetail->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Doctor Speciality Details'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Doctor Speciality Detail'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Doctor Specialities'), ['controller' => 'DoctorSpecialities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Doctor Speciality'), ['controller' => 'DoctorSpecialities', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Doctors'), ['controller' => 'Doctors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Doctor'), ['controller' => 'Doctors', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="doctorSpecialityDetails view large-9 medium-8 columns content">
    <h3><?= h($doctorSpecialityDetail->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Doctor Speciality') ?></th>
            <td><?= $doctorSpecialityDetail->has('doctor_speciality') ? $this->Html->link($doctorSpecialityDetail->doctor_speciality->id, ['controller' => 'DoctorSpecialities', 'action' => 'view', $doctorSpecialityDetail->doctor_speciality->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Doctor') ?></th>
            <td><?= $doctorSpecialityDetail->has('doctor') ? $this->Html->link($doctorSpecialityDetail->doctor->id, ['controller' => 'Doctors', 'action' => 'view', $doctorSpecialityDetail->doctor->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($doctorSpecialityDetail->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($doctorSpecialityDetail->created) ?></td>
        </tr>
    </table>
</div>
