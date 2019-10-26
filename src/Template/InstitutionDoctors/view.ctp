<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Institution Doctor'), ['action' => 'edit', $institutionDoctor->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Institution Doctor'), ['action' => 'delete', $institutionDoctor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $institutionDoctor->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Institution Doctors'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Institution Doctor'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Institutions'), ['controller' => 'Institutions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Institution'), ['controller' => 'Institutions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Doctors'), ['controller' => 'Doctors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Doctor'), ['controller' => 'Doctors', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Doctor Specialities'), ['controller' => 'DoctorSpecialities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Doctor Speciality'), ['controller' => 'DoctorSpecialities', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="institutionDoctors view large-9 medium-8 columns content">
    <h3><?= h($institutionDoctor->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Institution') ?></th>
            <td><?= $institutionDoctor->has('institution') ? $this->Html->link($institutionDoctor->institution->id, ['controller' => 'Institutions', 'action' => 'view', $institutionDoctor->institution->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Doctor') ?></th>
            <td><?= $institutionDoctor->has('doctor') ? $this->Html->link($institutionDoctor->doctor->id, ['controller' => 'Doctors', 'action' => 'view', $institutionDoctor->doctor->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($institutionDoctor->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('State') ?></th>
            <td><?= $this->Number->format($institutionDoctor->state) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($institutionDoctor->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($institutionDoctor->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Doctor Specialities') ?></h4>
        <?php if (!empty($institutionDoctor->doctor_specialities)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Doctor Id') ?></th>
                <th scope="col"><?= __('Institution Doctor Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($institutionDoctor->doctor_specialities as $doctorSpecialities): ?>
            <tr>
                <td><?= h($doctorSpecialities->id) ?></td>
                <td><?= h($doctorSpecialities->doctor_id) ?></td>
                <td><?= h($doctorSpecialities->institution_doctor_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'DoctorSpecialities', 'action' => 'view', $doctorSpecialities->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'DoctorSpecialities', 'action' => 'edit', $doctorSpecialities->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'DoctorSpecialities', 'action' => 'delete', $doctorSpecialities->id], ['confirm' => __('Are you sure you want to delete # {0}?', $doctorSpecialities->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
