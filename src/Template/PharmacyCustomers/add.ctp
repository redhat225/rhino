<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Pharmacy Customers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Pharmacy Invoices'), ['controller' => 'PharmacyInvoices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pharmacy Invoice'), ['controller' => 'PharmacyInvoices', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pharmacyCustomers form large-9 medium-8 columns content">
    <?= $this->Form->create($pharmacyCustomer) ?>
    <fieldset>
        <legend><?= __('Add Pharmacy Customer') ?></legend>
        <?php
            echo $this->Form->input('fullname');
            echo $this->Form->input('code');
            echo $this->Form->input('type');
            echo $this->Form->input('ispatient');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
