<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Doctor Act Detail'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Doctors'), ['controller' => 'Doctors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Doctor'), ['controller' => 'Doctors', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Doctor Acts'), ['controller' => 'DoctorActs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Doctor Act'), ['controller' => 'DoctorActs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="doctorActDetails index large-9 medium-8 columns content">
    <h3><?= __('Doctor Act Details') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('doctor_id') ?></th>
                <th><?= $this->Paginator->sort('doctor_act_id') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($doctorActDetails as $doctorActDetail): ?>
            <tr>
                <td><?= $this->Number->format($doctorActDetail->id) ?></td>
                <td><?= $doctorActDetail->has('doctor') ? $this->Html->link($doctorActDetail->doctor->id, ['controller' => 'Doctors', 'action' => 'view', $doctorActDetail->doctor->id]) : '' ?></td>
                <td><?= $doctorActDetail->has('doctor_act') ? $this->Html->link($doctorActDetail->doctor_act->id, ['controller' => 'DoctorActs', 'action' => 'view', $doctorActDetail->doctor_act->id]) : '' ?></td>
                <td><?= h($doctorActDetail->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $doctorActDetail->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $doctorActDetail->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $doctorActDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $doctorActDetail->id)]) ?>
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
