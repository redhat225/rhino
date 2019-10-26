<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pharmacy Payment'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pharmacy Payment Methods'), ['controller' => 'PharmacyPaymentMethods', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pharmacy Payment Method'), ['controller' => 'PharmacyPaymentMethods', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pharmacy Invoices'), ['controller' => 'PharmacyInvoices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pharmacy Invoice'), ['controller' => 'PharmacyInvoices', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pharmacyPayments index large-9 medium-8 columns content">
    <h3><?= __('Pharmacy Payments') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('code') ?></th>
                <th><?= $this->Paginator->sort('amount') ?></th>
                <th><?= $this->Paginator->sort('pharmacy_payment_method_id') ?></th>
                <th><?= $this->Paginator->sort('pharmacy_invoice_id') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pharmacyPayments as $pharmacyPayment): ?>
            <tr>
                <td><?= $this->Number->format($pharmacyPayment->id) ?></td>
                <td><?= h($pharmacyPayment->code) ?></td>
                <td><?= $this->Number->format($pharmacyPayment->amount) ?></td>
                <td><?= $pharmacyPayment->has('pharmacy_payment_method') ? $this->Html->link($pharmacyPayment->pharmacy_payment_method->name, ['controller' => 'PharmacyPaymentMethods', 'action' => 'view', $pharmacyPayment->pharmacy_payment_method->id]) : '' ?></td>
                <td><?= $pharmacyPayment->has('pharmacy_invoice') ? $this->Html->link($pharmacyPayment->pharmacy_invoice->id, ['controller' => 'PharmacyInvoices', 'action' => 'view', $pharmacyPayment->pharmacy_invoice->id]) : '' ?></td>
                <td><?= h($pharmacyPayment->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pharmacyPayment->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pharmacyPayment->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pharmacyPayment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pharmacyPayment->id)]) ?>
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
