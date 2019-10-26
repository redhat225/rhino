<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Visit Invoice Payment'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visit Invoices'), ['controller' => 'VisitInvoices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit Invoice'), ['controller' => 'VisitInvoices', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visit Invoice Payment Methods'), ['controller' => 'VisitInvoicePaymentMethods', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit Invoice Payment Method'), ['controller' => 'VisitInvoicePaymentMethods', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="visitInvoicePayments index large-9 medium-8 columns content">
    <h3><?= __('Visit Invoice Payments') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('amount') ?></th>
                <th><?= $this->Paginator->sort('visit_invoice_id') ?></th>
                <th><?= $this->Paginator->sort('visit_invoice_payment_method_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($visitInvoicePayments as $visitInvoicePayment): ?>
            <tr>
                <td><?= $this->Number->format($visitInvoicePayment->id) ?></td>
                <td><?= $this->Number->format($visitInvoicePayment->amount) ?></td>
                <td><?= $visitInvoicePayment->has('visit_invoice') ? $this->Html->link($visitInvoicePayment->visit_invoice->id, ['controller' => 'VisitInvoices', 'action' => 'view', $visitInvoicePayment->visit_invoice->id]) : '' ?></td>
                <td><?= $visitInvoicePayment->has('visit_invoice_payment_method') ? $this->Html->link($visitInvoicePayment->visit_invoice_payment_method->id, ['controller' => 'VisitInvoicePaymentMethods', 'action' => 'view', $visitInvoicePayment->visit_invoice_payment_method->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $visitInvoicePayment->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $visitInvoicePayment->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $visitInvoicePayment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visitInvoicePayment->id)]) ?>
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
