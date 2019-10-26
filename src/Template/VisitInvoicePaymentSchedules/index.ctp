<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Visit Invoice Payment Schedule'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visit Invoice Payments'), ['controller' => 'VisitInvoicePayments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit Invoice Payment'), ['controller' => 'VisitInvoicePayments', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="visitInvoicePaymentSchedules index large-9 medium-8 columns content">
    <h3><?= __('Visit Invoice Payment Schedules') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('expected_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('visit_invoice_payment_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($visitInvoicePaymentSchedules as $visitInvoicePaymentSchedule): ?>
            <tr>
                <td><?= $this->Number->format($visitInvoicePaymentSchedule->id) ?></td>
                <td><?= h($visitInvoicePaymentSchedule->created) ?></td>
                <td><?= h($visitInvoicePaymentSchedule->expected_date) ?></td>
                <td><?= $visitInvoicePaymentSchedule->has('visit_invoice_payment') ? $this->Html->link($visitInvoicePaymentSchedule->visit_invoice_payment->id, ['controller' => 'VisitInvoicePayments', 'action' => 'view', $visitInvoicePaymentSchedule->visit_invoice_payment->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $visitInvoicePaymentSchedule->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $visitInvoicePaymentSchedule->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $visitInvoicePaymentSchedule->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visitInvoicePaymentSchedule->id)]) ?>
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
