<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Manager Operator Act Detail'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Manager Operators'), ['controller' => 'ManagerOperators', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Manager Operator'), ['controller' => 'ManagerOperators', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Manager Operator Acts'), ['controller' => 'ManagerOperatorActs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Manager Operator Act'), ['controller' => 'ManagerOperatorActs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="managerOperatorActDetails index large-9 medium-8 columns content">
    <h3><?= __('Manager Operator Act Details') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('manager_operator_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('manager_operator_act_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($managerOperatorActDetails as $managerOperatorActDetail): ?>
            <tr>
                <td><?= $this->Number->format($managerOperatorActDetail->id) ?></td>
                <td><?= $managerOperatorActDetail->has('manager_operator') ? $this->Html->link($managerOperatorActDetail->manager_operator->id, ['controller' => 'ManagerOperators', 'action' => 'view', $managerOperatorActDetail->manager_operator->id]) : '' ?></td>
                <td><?= $managerOperatorActDetail->has('manager_operator_act') ? $this->Html->link($managerOperatorActDetail->manager_operator_act->id, ['controller' => 'ManagerOperatorActs', 'action' => 'view', $managerOperatorActDetail->manager_operator_act->id]) : '' ?></td>
                <td><?= h($managerOperatorActDetail->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $managerOperatorActDetail->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $managerOperatorActDetail->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $managerOperatorActDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $managerOperatorActDetail->id)]) ?>
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
