<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Institution Doctor'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Institutions'), ['controller' => 'Institutions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Institution'), ['controller' => 'Institutions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Doctors'), ['controller' => 'Doctors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Doctor'), ['controller' => 'Doctors', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Doctor Specialities'), ['controller' => 'DoctorSpecialities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Doctor Speciality'), ['controller' => 'DoctorSpecialities', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="institutionDoctors index large-9 medium-8 columns content">
    <h3><?= __('Institution Doctors') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('institution_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('doctor_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('state') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($institutionDoctors as $institutionDoctor): ?>
            <tr>
                <td><?= $this->Number->format($institutionDoctor->id) ?></td>
                <td><?= $institutionDoctor->has('institution') ? $this->Html->link($institutionDoctor->institution->id, ['controller' => 'Institutions', 'action' => 'view', $institutionDoctor->institution->id]) : '' ?></td>
                <td><?= $institutionDoctor->has('doctor') ? $this->Html->link($institutionDoctor->doctor->id, ['controller' => 'Doctors', 'action' => 'view', $institutionDoctor->doctor->id]) : '' ?></td>
                <td><?= h($institutionDoctor->created) ?></td>
                <td><?= h($institutionDoctor->modified) ?></td>
                <td><?= $this->Number->format($institutionDoctor->state) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $institutionDoctor->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $institutionDoctor->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $institutionDoctor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $institutionDoctor->id)]) ?>
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
