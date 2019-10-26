<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Institution Schedule'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="institutionSchedules index large-9 medium-8 columns content">
    <h3><?= __('Institution Schedules') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('schedule_type') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($institutionSchedules as $institutionSchedule): ?>
            <tr>
                <td><?= $this->Number->format($institutionSchedule->id) ?></td>
                <td><?= h($institutionSchedule->created) ?></td>
                <td><?= h($institutionSchedule->modified) ?></td>
                <td><?= h($institutionSchedule->schedule_type) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $institutionSchedule->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $institutionSchedule->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $institutionSchedule->id], ['confirm' => __('Are you sure you want to delete # {0}?', $institutionSchedule->id)]) ?>
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
