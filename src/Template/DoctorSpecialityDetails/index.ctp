<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Doctor Speciality Detail'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Doctor Specialities'), ['controller' => 'DoctorSpecialities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Doctor Speciality'), ['controller' => 'DoctorSpecialities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Doctors'), ['controller' => 'Doctors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Doctor'), ['controller' => 'Doctors', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="doctorSpecialityDetails index large-9 medium-8 columns content">
    <h3><?= __('Doctor Speciality Details') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('doctor_speciality_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('doctor_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($doctorSpecialityDetails as $doctorSpecialityDetail): ?>
            <tr>
                <td><?= $this->Number->format($doctorSpecialityDetail->id) ?></td>
                <td><?= $doctorSpecialityDetail->has('doctor_speciality') ? $this->Html->link($doctorSpecialityDetail->doctor_speciality->id, ['controller' => 'DoctorSpecialities', 'action' => 'view', $doctorSpecialityDetail->doctor_speciality->id]) : '' ?></td>
                <td><?= $doctorSpecialityDetail->has('doctor') ? $this->Html->link($doctorSpecialityDetail->doctor->id, ['controller' => 'Doctors', 'action' => 'view', $doctorSpecialityDetail->doctor->id]) : '' ?></td>
                <td><?= h($doctorSpecialityDetail->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $doctorSpecialityDetail->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $doctorSpecialityDetail->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $doctorSpecialityDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $doctorSpecialityDetail->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
