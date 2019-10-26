<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Visit Invoice Item'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visit Invoice Item Categories'), ['controller' => 'VisitInvoiceItemCategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit Invoice Item Category'), ['controller' => 'VisitInvoiceItemCategories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Institutions'), ['controller' => 'Institutions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Institution'), ['controller' => 'Institutions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visit Invoices'), ['controller' => 'VisitInvoices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit Invoice'), ['controller' => 'VisitInvoices', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="visitInvoiceItems index large-9 medium-8 columns content">
    <h3><?= __('Visit Invoice Items') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('label_item') ?></th>
                <th scope="col"><?= $this->Paginator->sort('visit_invoice_item_category_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('institution_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($visitInvoiceItems as $visitInvoiceItem): ?>
            <tr>
                <td><?= $this->Number->format($visitInvoiceItem->id) ?></td>
                <td><?= h($visitInvoiceItem->label_item) ?></td>
                <td><?= $visitInvoiceItem->has('visit_invoice_item_category') ? $this->Html->link($visitInvoiceItem->visit_invoice_item_category->id, ['controller' => 'VisitInvoiceItemCategories', 'action' => 'view', $visitInvoiceItem->visit_invoice_item_category->id]) : '' ?></td>
                <td><?= $visitInvoiceItem->has('institution') ? $this->Html->link($visitInvoiceItem->institution->id, ['controller' => 'Institutions', 'action' => 'view', $visitInvoiceItem->institution->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $visitInvoiceItem->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $visitInvoiceItem->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $visitInvoiceItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visitInvoiceItem->id)]) ?>
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
