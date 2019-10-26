<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Visit Invoice Payment'), ['action' => 'edit', $visitInvoicePayment->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Visit Invoice Payment'), ['action' => 'delete', $visitInvoicePayment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visitInvoicePayment->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Visit Invoice Payments'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visit Invoice Payment'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Visit Invoices'), ['controller' => 'VisitInvoices', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visit Invoice'), ['controller' => 'VisitInvoices', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Visit Invoice Payment Methods'), ['controller' => 'VisitInvoicePaymentMethods', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visit Invoice Payment Method'), ['controller' => 'VisitInvoicePaymentMethods', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="visitInvoicePayments view large-9 medium-8 columns content">
    <h3><?= h($visitInvoicePayment->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Visit Invoice') ?></th>
            <td><?= $visitInvoicePayment->has('visit_invoice') ? $this->Html->link($visitInvoicePayment->visit_invoice->id, ['controller' => 'VisitInvoices', 'action' => 'view', $visitInvoicePayment->visit_invoice->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Visit Invoice Payment Method') ?></th>
            <td><?= $visitInvoicePayment->has('visit_invoice_payment_method') ? $this->Html->link($visitInvoicePayment->visit_invoice_payment_method->id, ['controller' => 'VisitInvoicePaymentMethods', 'action' => 'view', $visitInvoicePayment->visit_invoice_payment_method->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($visitInvoicePayment->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Amount') ?></th>
            <td><?= $this->Number->format($visitInvoicePayment->amount) ?></td>
        </tr>
    </table>
</div>
