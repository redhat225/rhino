<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pharmacy Payment'), ['action' => 'edit', $pharmacyPayment->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pharmacy Payment'), ['action' => 'delete', $pharmacyPayment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pharmacyPayment->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pharmacy Payments'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pharmacy Payment'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pharmacy Payment Methods'), ['controller' => 'PharmacyPaymentMethods', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pharmacy Payment Method'), ['controller' => 'PharmacyPaymentMethods', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pharmacy Invoices'), ['controller' => 'PharmacyInvoices', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pharmacy Invoice'), ['controller' => 'PharmacyInvoices', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pharmacyPayments view large-9 medium-8 columns content">
    <h3><?= h($pharmacyPayment->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Code') ?></th>
            <td><?= h($pharmacyPayment->code) ?></td>
        </tr>
        <tr>
            <th><?= __('Pharmacy Payment Method') ?></th>
            <td><?= $pharmacyPayment->has('pharmacy_payment_method') ? $this->Html->link($pharmacyPayment->pharmacy_payment_method->name, ['controller' => 'PharmacyPaymentMethods', 'action' => 'view', $pharmacyPayment->pharmacy_payment_method->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Pharmacy Invoice') ?></th>
            <td><?= $pharmacyPayment->has('pharmacy_invoice') ? $this->Html->link($pharmacyPayment->pharmacy_invoice->id, ['controller' => 'PharmacyInvoices', 'action' => 'view', $pharmacyPayment->pharmacy_invoice->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($pharmacyPayment->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Amount') ?></th>
            <td><?= $this->Number->format($pharmacyPayment->amount) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($pharmacyPayment->created) ?></td>
        </tr>
    </table>
</div>
