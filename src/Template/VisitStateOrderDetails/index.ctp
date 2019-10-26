<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Visit State Order Detail'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visit States'), ['controller' => 'VisitStates', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit State'), ['controller' => 'VisitStates', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visit State Order Types'), ['controller' => 'VisitStateOrderTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit State Order Type'), ['controller' => 'VisitStateOrderTypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="visitStateOrderDetails index large-9 medium-8 columns content">
    <h3><?= __('Visit State Order Details') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('visit_state_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('visit_state_order_type_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_by') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($visitStateOrderDetails as $visitStateOrderDetail): ?>
            <tr>
                <td><?= $this->Number->format($visitStateOrderDetail->id) ?></td>
                <td><?= h($visitStateOrderDetail->created) ?></td>
                <td><?= h($visitStateOrderDetail->modified) ?></td>
                <td><?= $visitStateOrderDetail->has('visit_state') ? $this->Html->link($visitStateOrderDetail->visit_state->id, ['controller' => 'VisitStates', 'action' => 'view', $visitStateOrderDetail->visit_state->id]) : '' ?></td>
                <td><?= $visitStateOrderDetail->has('visit_state_order_type') ? $this->Html->link($visitStateOrderDetail->visit_state_order_type->id, ['controller' => 'VisitStateOrderTypes', 'action' => 'view', $visitStateOrderDetail->visit_state_order_type->id]) : '' ?></td>
                <td><?= h($visitStateOrderDetail->created_by) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $visitStateOrderDetail->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $visitStateOrderDetail->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $visitStateOrderDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visitStateOrderDetail->id)]) ?>
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
