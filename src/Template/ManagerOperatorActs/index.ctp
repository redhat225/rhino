<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Manager Operator Act'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Manager Operator Act Details'), ['controller' => 'ManagerOperatorActDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Manager Operator Act Detail'), ['controller' => 'ManagerOperatorActDetails', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="managerOperatorActs index large-9 medium-8 columns content">
    <h3><?= __('Manager Operator Acts') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('label_manager_op_act') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($managerOperatorActs as $managerOperatorAct): ?>
            <tr>
                <td><?= $this->Number->format($managerOperatorAct->id) ?></td>
                <td><?= h($managerOperatorAct->label_manager_op_act) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $managerOperatorAct->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $managerOperatorAct->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $managerOperatorAct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $managerOperatorAct->id)]) ?>
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
