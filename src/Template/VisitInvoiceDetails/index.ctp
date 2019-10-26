<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Visit Invoice Detail'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visit Invoices'), ['controller' => 'VisitInvoices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit Invoice'), ['controller' => 'VisitInvoices', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visit Invoice Items'), ['controller' => 'VisitInvoiceItems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit Invoice Item'), ['controller' => 'VisitInvoiceItems', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="visitInvoiceDetails index large-9 medium-8 columns content">
    <h3><?= __('Visit Invoice Details') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('visit_invoice_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('visit_invoice_item_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('qty') ?></th>
                <th scope="col"><?= $this->Paginator->sort('amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('details') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($visitInvoiceDetails as $visitInvoiceDetail): ?>
            <tr>
                <td><?= $this->Number->format($visitInvoiceDetail->id) ?></td>
                <td><?= h($visitInvoiceDetail->created) ?></td>
                <td><?= h($visitInvoiceDetail->modified) ?></td>
                <td><?= $visitInvoiceDetail->has('visit_invoice') ? $this->Html->link($visitInvoiceDetail->visit_invoice->id, ['controller' => 'VisitInvoices', 'action' => 'view', $visitInvoiceDetail->visit_invoice->id]) : '' ?></td>
                <td><?= $visitInvoiceDetail->has('visit_invoice_item') ? $this->Html->link($visitInvoiceDetail->visit_invoice_item->id, ['controller' => 'VisitInvoiceItems', 'action' => 'view', $visitInvoiceDetail->visit_invoice_item->id]) : '' ?></td>
                <td><?= $this->Number->format($visitInvoiceDetail->qty) ?></td>
                <td><?= $this->Number->format($visitInvoiceDetail->amount) ?></td>
                <td><?= h($visitInvoiceDetail->details) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $visitInvoiceDetail->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $visitInvoiceDetail->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $visitInvoiceDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visitInvoiceDetail->id)]) ?>
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
