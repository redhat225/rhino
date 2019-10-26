<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $visitInvoicePayment->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $visitInvoicePayment->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Visit Invoice Payments'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Visit Invoices'), ['controller' => 'VisitInvoices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit Invoice'), ['controller' => 'VisitInvoices', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visit Invoice Payment Methods'), ['controller' => 'VisitInvoicePaymentMethods', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit Invoice Payment Method'), ['controller' => 'VisitInvoicePaymentMethods', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="visitInvoicePayments form large-9 medium-8 columns content">
    <?= $this->Form->create($visitInvoicePayment) ?>
    <fieldset>
        <legend><?= __('Edit Visit Invoice Payment') ?></legend>
        <?php
            echo $this->Form->input('amount');
            echo $this->Form->input('visit_invoice_id', ['options' => $visitInvoices]);
            echo $this->Form->input('visit_invoice_payment_method_id', ['options' => $visitInvoicePaymentMethods]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
