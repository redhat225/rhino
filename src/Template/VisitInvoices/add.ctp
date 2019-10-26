<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Visit Invoices'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Visits'), ['controller' => 'Visits', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit'), ['controller' => 'Visits', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visit Invoice Types'), ['controller' => 'VisitInvoiceTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit Invoice Type'), ['controller' => 'VisitInvoiceTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Manager Operators'), ['controller' => 'ManagerOperators', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Manager Operator'), ['controller' => 'ManagerOperators', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visit Invoice Details'), ['controller' => 'VisitInvoiceDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit Invoice Detail'), ['controller' => 'VisitInvoiceDetails', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visit Invoice Payments'), ['controller' => 'VisitInvoicePayments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit Invoice Payment'), ['controller' => 'VisitInvoicePayments', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="visitInvoices form large-9 medium-8 columns content">
    <?= $this->Form->create($visitInvoice) ?>
    <fieldset>
        <legend><?= __('Add Visit Invoice') ?></legend>
        <?php
            echo $this->Form->input('visit_id', ['options' => $visits]);
            echo $this->Form->input('amount');
            echo $this->Form->input('deleted', ['empty' => true]);
            echo $this->Form->input('visit_invoice_type_id', ['options' => $visitInvoiceTypes]);
            echo $this->Form->input('manager_operator_id', ['options' => $managerOperators]);
            echo $this->Form->input('state');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
