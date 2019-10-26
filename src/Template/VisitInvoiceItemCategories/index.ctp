<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Visit Invoice Item Category'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visit Invoice Items'), ['controller' => 'VisitInvoiceItems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit Invoice Item'), ['controller' => 'VisitInvoiceItems', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="visitInvoiceItemCategories index large-9 medium-8 columns content">
    <h3><?= __('Visit Invoice Item Categories') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('label_item_category') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($visitInvoiceItemCategories as $visitInvoiceItemCategory): ?>
            <tr>
                <td><?= $this->Number->format($visitInvoiceItemCategory->id) ?></td>
                <td><?= h($visitInvoiceItemCategory->label_item_category) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $visitInvoiceItemCategory->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $visitInvoiceItemCategory->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $visitInvoiceItemCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visitInvoiceItemCategory->id)]) ?>
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
