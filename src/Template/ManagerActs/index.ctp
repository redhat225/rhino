<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Manager Act'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="managerActs index large-9 medium-8 columns content">
    <h3><?= __('Manager Acts') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('label_manager_act') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($managerActs as $managerAct): ?>
            <tr>
                <td><?= $this->Number->format($managerAct->id) ?></td>
                <td><?= h($managerAct->label_manager_act) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $managerAct->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $managerAct->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $managerAct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $managerAct->id)]) ?>
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
