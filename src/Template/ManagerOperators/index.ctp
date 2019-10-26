<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Manager Operator'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List People'), ['controller' => 'People', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Person'), ['controller' => 'People', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visit Meeting Invoices'), ['controller' => 'VisitMeetingInvoices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit Meeting Invoice'), ['controller' => 'VisitMeetingInvoices', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="managerOperators index large-9 medium-8 columns content">
    <h3><?= __('Manager Operators') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('people_id') ?></th>
                <th><?= $this->Paginator->sort('code') ?></th>
                <th><?= $this->Paginator->sort('username') ?></th>
                <th><?= $this->Paginator->sort('email') ?></th>
                <th><?= $this->Paginator->sort('avatar_manager') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($managerOperators as $managerOperator): ?>
            <tr>
                <td><?= $this->Number->format($managerOperator->id) ?></td>
                <td><?= $managerOperator->has('person') ? $this->Html->link($managerOperator->person->id, ['controller' => 'People', 'action' => 'view', $managerOperator->person->id]) : '' ?></td>
                <td><?= h($managerOperator->code) ?></td>
                <td><?= h($managerOperator->username) ?></td>
                <td><?= h($managerOperator->email) ?></td>
                <td><?= h($managerOperator->avatar_manager) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $managerOperator->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $managerOperator->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $managerOperator->id], ['confirm' => __('Are you sure you want to delete # {0}?', $managerOperator->id)]) ?>
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
