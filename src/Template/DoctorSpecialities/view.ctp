<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Doctor Speciality'), ['action' => 'edit', $doctorSpeciality->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Doctor Speciality'), ['action' => 'delete', $doctorSpeciality->id], ['confirm' => __('Are you sure you want to delete # {0}?', $doctorSpeciality->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Doctor Specialities'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Doctor Speciality'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Doctor Speciality Details'), ['controller' => 'DoctorSpecialityDetails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Doctor Speciality Detail'), ['controller' => 'DoctorSpecialityDetails', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="doctorSpecialities view large-9 medium-8 columns content">
    <h3><?= h($doctorSpeciality->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Label Doctor Speciality') ?></th>
            <td><?= h($doctorSpeciality->label_doctor_speciality) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($doctorSpeciality->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Doctor Speciality Type Id') ?></th>
            <td><?= $this->Number->format($doctorSpeciality->doctor_speciality_type_id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Doctor Speciality Details') ?></h4>
        <?php if (!empty($doctorSpeciality->doctor_speciality_details)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Doctor Speciality Id') ?></th>
                <th scope="col"><?= __('Doctor Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($doctorSpeciality->doctor_speciality_details as $doctorSpecialityDetails): ?>
            <tr>
                <td><?= h($doctorSpecialityDetails->id) ?></td>
                <td><?= h($doctorSpecialityDetails->doctor_speciality_id) ?></td>
                <td><?= h($doctorSpecialityDetails->doctor_id) ?></td>
                <td><?= h($doctorSpecialityDetails->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'DoctorSpecialityDetails', 'action' => 'view', $doctorSpecialityDetails->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'DoctorSpecialityDetails', 'action' => 'edit', $doctorSpecialityDetails->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'DoctorSpecialityDetails', 'action' => 'delete', $doctorSpecialityDetails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $doctorSpecialityDetails->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
