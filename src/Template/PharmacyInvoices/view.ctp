<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pharmacy Invoice'), ['action' => 'edit', $pharmacyInvoice->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pharmacy Invoice'), ['action' => 'delete', $pharmacyInvoice->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pharmacyInvoice->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pharmacy Invoices'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pharmacy Invoice'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pharmacy Operators'), ['controller' => 'PharmacyOperators', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pharmacy Operator'), ['controller' => 'PharmacyOperators', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pharmacy Customers'), ['controller' => 'PharmacyCustomers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pharmacy Customer'), ['controller' => 'PharmacyCustomers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pharmacy Invoice Details'), ['controller' => 'PharmacyInvoiceDetails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pharmacy Invoice Detail'), ['controller' => 'PharmacyInvoiceDetails', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pharmacy Payments'), ['controller' => 'PharmacyPayments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pharmacy Payment'), ['controller' => 'PharmacyPayments', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pharmacyInvoices view large-9 medium-8 columns content">
    <h3><?= h($pharmacyInvoice->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Code') ?></th>
            <td><?= h($pharmacyInvoice->code) ?></td>
        </tr>
        <tr>
            <th><?= __('Pharmacy Operator') ?></th>
            <td><?= $pharmacyInvoice->has('pharmacy_operator') ? $this->Html->link($pharmacyInvoice->pharmacy_operator->id, ['controller' => 'PharmacyOperators', 'action' => 'view', $pharmacyInvoice->pharmacy_operator->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Pharmacy Customer') ?></th>
            <td><?= $pharmacyInvoice->has('pharmacy_customer') ? $this->Html->link($pharmacyInvoice->pharmacy_customer->id, ['controller' => 'PharmacyCustomers', 'action' => 'view', $pharmacyInvoice->pharmacy_customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($pharmacyInvoice->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($pharmacyInvoice->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Details') ?></th>
            <td><?= h($pharmacyInvoice->details) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Pharmacy Invoice Details') ?></h4>
        <?php if (!empty($pharmacyInvoice->pharmacy_invoice_details)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Qty') ?></th>
                <th><?= __('Pharmacy Store Product Id') ?></th>
                <th><?= __('Unit Price') ?></th>
                <th><?= __('Percentage Discount') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Pharmacy Invoice Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($pharmacyInvoice->pharmacy_invoice_details as $pharmacyInvoiceDetails): ?>
            <tr>
                <td><?= h($pharmacyInvoiceDetails->id) ?></td>
                <td><?= h($pharmacyInvoiceDetails->qty) ?></td>
                <td><?= h($pharmacyInvoiceDetails->pharmacy_store_product_id) ?></td>
                <td><?= h($pharmacyInvoiceDetails->unit_price) ?></td>
                <td><?= h($pharmacyInvoiceDetails->percentage_discount) ?></td>
                <td><?= h($pharmacyInvoiceDetails->created) ?></td>
                <td><?= h($pharmacyInvoiceDetails->pharmacy_invoice_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PharmacyInvoiceDetails', 'action' => 'view', $pharmacyInvoiceDetails->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PharmacyInvoiceDetails', 'action' => 'edit', $pharmacyInvoiceDetails->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PharmacyInvoiceDetails', 'action' => 'delete', $pharmacyInvoiceDetails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pharmacyInvoiceDetails->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Pharmacy Payments') ?></h4>
        <?php if (!empty($pharmacyInvoice->pharmacy_payments)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Code') ?></th>
                <th><?= __('Amount') ?></th>
                <th><?= __('Pharmacy Payment Method Id') ?></th>
                <th><?= __('Pharmacy Invoice Id') ?></th>
                <th><?= __('Created') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($pharmacyInvoice->pharmacy_payments as $pharmacyPayments): ?>
            <tr>
                <td><?= h($pharmacyPayments->id) ?></td>
                <td><?= h($pharmacyPayments->code) ?></td>
                <td><?= h($pharmacyPayments->amount) ?></td>
                <td><?= h($pharmacyPayments->pharmacy_payment_method_id) ?></td>
                <td><?= h($pharmacyPayments->pharmacy_invoice_id) ?></td>
                <td><?= h($pharmacyPayments->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PharmacyPayments', 'action' => 'view', $pharmacyPayments->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PharmacyPayments', 'action' => 'edit', $pharmacyPayments->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PharmacyPayments', 'action' => 'delete', $pharmacyPayments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pharmacyPayments->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
