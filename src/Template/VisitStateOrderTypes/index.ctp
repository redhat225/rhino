<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Visit State Order Type'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visit States'), ['controller' => 'VisitStates', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit State'), ['controller' => 'VisitStates', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="visitStateOrderTypes index large-9 medium-8 columns content">
    <h3><?= __('Visit State Order Types') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('label_order_type') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($visitStateOrderTypes as $visitStateOrderType): ?>
            <tr>
                <td><?= $this->Number->format($visitStateOrderType->id) ?></td>
                <td><?= h($visitStateOrderType->label_order_type) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $visitStateOrderType->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $visitStateOrderType->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $visitStateOrderType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visitStateOrderType->id)]) ?>
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
