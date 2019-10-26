<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Visit Kind Transport'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visits'), ['controller' => 'Visits', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit'), ['controller' => 'Visits', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="visitKindTransports index large-9 medium-8 columns content">
    <h3><?= __('Visit Kind Transports') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('label') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($visitKindTransports as $visitKindTransport): ?>
            <tr>
                <td><?= $this->Number->format($visitKindTransport->id) ?></td>
                <td><?= h($visitKindTransport->label) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $visitKindTransport->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $visitKindTransport->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $visitKindTransport->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visitKindTransport->id)]) ?>
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
