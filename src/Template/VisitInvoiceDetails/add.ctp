<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Visit Invoice Details'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Visit Invoices'), ['controller' => 'VisitInvoices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit Invoice'), ['controller' => 'VisitInvoices', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visit Invoice Items'), ['controller' => 'VisitInvoiceItems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit Invoice Item'), ['controller' => 'VisitInvoiceItems', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="visitInvoiceDetails form large-9 medium-8 columns content">
    <?= $this->Form->create($visitInvoiceDetail) ?>
    <fieldset>
        <legend><?= __('Add Visit Invoice Detail') ?></legend>
        <?php
            echo $this->Form->input('visit_invoice_id', ['options' => $visitInvoices]);
            echo $this->Form->input('visit_invoice_item_id', ['options' => $visitInvoiceItems]);
            echo $this->Form->input('qty');
            echo $this->Form->input('amount');
            echo $this->Form->input('details');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
