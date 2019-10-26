<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Doctor Speciality'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Doctor Speciality Details'), ['controller' => 'DoctorSpecialityDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Doctor Speciality Detail'), ['controller' => 'DoctorSpecialityDetails', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="doctorSpecialities index large-9 medium-8 columns content">
    <h3><?= __('Doctor Specialities') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('label_doctor_speciality') ?></th>
                <th scope="col"><?= $this->Paginator->sort('doctor_speciality_type_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($doctorSpecialities as $doctorSpeciality): ?>
            <tr>
                <td><?= $this->Number->format($doctorSpeciality->id) ?></td>
                <td><?= h($doctorSpeciality->label_doctor_speciality) ?></td>
                <td><?= $this->Number->format($doctorSpeciality->doctor_speciality_type_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $doctorSpeciality->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $doctorSpeciality->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $doctorSpeciality->id], ['confirm' => __('Are you sure you want to delete # {0}?', $doctorSpeciality->id)]) ?>
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
