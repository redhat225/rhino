<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Visit Invoice Payment Schedule'), ['action' => 'edit', $visitInvoicePaymentSchedule->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Visit Invoice Payment Schedule'), ['action' => 'delete', $visitInvoicePaymentSchedule->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visitInvoicePaymentSchedule->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Visit Invoice Payment Schedules'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visit Invoice Payment Schedule'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Visit Invoice Payments'), ['controller' => 'VisitInvoicePayments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visit Invoice Payment'), ['controller' => 'VisitInvoicePayments', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="visitInvoicePaymentSchedules view large-9 medium-8 columns content">
    <h3><?= h($visitInvoicePaymentSchedule->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Visit Invoice Payment') ?></th>
            <td><?= $visitInvoicePaymentSchedule->has('visit_invoice_payment') ? $this->Html->link($visitInvoicePaymentSchedule->visit_invoice_payment->id, ['controller' => 'VisitInvoicePayments', 'action' => 'view', $visitInvoicePaymentSchedule->visit_invoice_payment->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($visitInvoicePaymentSchedule->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($visitInvoicePaymentSchedule->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Expected Date') ?></th>
            <td><?= h($visitInvoicePaymentSchedule->expected_date) ?></td>
        </tr>
    </table>
</div>
