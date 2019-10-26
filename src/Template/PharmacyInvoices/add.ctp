<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Pharmacy Invoices'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Pharmacy Operators'), ['controller' => 'PharmacyOperators', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pharmacy Operator'), ['controller' => 'PharmacyOperators', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pharmacy Customers'), ['controller' => 'PharmacyCustomers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pharmacy Customer'), ['controller' => 'PharmacyCustomers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pharmacy Invoice Details'), ['controller' => 'PharmacyInvoiceDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pharmacy Invoice Detail'), ['controller' => 'PharmacyInvoiceDetails', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pharmacy Payments'), ['controller' => 'PharmacyPayments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pharmacy Payment'), ['controller' => 'PharmacyPayments', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pharmacyInvoices form large-9 medium-8 columns content">
    <?= $this->Form->create($pharmacyInvoice) ?>
    <fieldset>
        <legend><?= __('Add Pharmacy Invoice') ?></legend>
        <?php
            echo $this->Form->input('code');
            echo $this->Form->input('details', ['empty' => true]);
            echo $this->Form->input('pharmacy_operator_id', ['options' => $pharmacyOperators]);
            echo $this->Form->input('pharmacy_customer_id', ['options' => $pharmacyCustomers]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
