<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Visit Order Type'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visit Order Details'), ['controller' => 'VisitOrderDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit Order Detail'), ['controller' => 'VisitOrderDetails', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="visitOrderTypes index large-9 medium-8 columns content">
    <h3><?= __('Visit Order Types') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('label') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($visitOrderTypes as $visitOrderType): ?>
            <tr>
                <td><?= $this->Number->format($visitOrderType->id) ?></td>
                <td><?= h($visitOrderType->label) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $visitOrderType->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $visitOrderType->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $visitOrderType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visitOrderType->id)]) ?>
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
