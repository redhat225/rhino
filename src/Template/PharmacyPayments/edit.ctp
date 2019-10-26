<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $pharmacyPayment->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $pharmacyPayment->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Pharmacy Payments'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Pharmacy Payment Methods'), ['controller' => 'PharmacyPaymentMethods', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pharmacy Payment Method'), ['controller' => 'PharmacyPaymentMethods', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pharmacy Invoices'), ['controller' => 'PharmacyInvoices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pharmacy Invoice'), ['controller' => 'PharmacyInvoices', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pharmacyPayments form large-9 medium-8 columns content">
    <?= $this->Form->create($pharmacyPayment) ?>
    <fieldset>
        <legend><?= __('Edit Pharmacy Payment') ?></legend>
        <?php
            echo $this->Form->input('code');
            echo $this->Form->input('amount');
            echo $this->Form->input('pharmacy_payment_method_id', ['options' => $pharmacyPaymentMethods]);
            echo $this->Form->input('pharmacy_invoice_id', ['options' => $pharmacyInvoices]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
