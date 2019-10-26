<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Visit Invoice Payment Schedules'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Visit Invoice Payments'), ['controller' => 'VisitInvoicePayments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit Invoice Payment'), ['controller' => 'VisitInvoicePayments', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="visitInvoicePaymentSchedules form large-9 medium-8 columns content">
    <?= $this->Form->create($visitInvoicePaymentSchedule) ?>
    <fieldset>
        <legend><?= __('Add Visit Invoice Payment Schedule') ?></legend>
        <?php
            echo $this->Form->input('expected_date');
            echo $this->Form->input('visit_invoice_payment_id', ['options' => $visitInvoicePayments]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
