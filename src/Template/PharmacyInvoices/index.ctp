<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pharmacy Invoice'), ['action' => 'add']) ?></li>
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
<div class="pharmacyInvoices index large-9 medium-8 columns content">
    <h3><?= __('Pharmacy Invoices') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('code') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('details') ?></th>
                <th><?= $this->Paginator->sort('pharmacy_operator_id') ?></th>
                <th><?= $this->Paginator->sort('pharmacy_customer_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pharmacyInvoices as $pharmacyInvoice): ?>
            <tr>
                <td><?= $this->Number->format($pharmacyInvoice->id) ?></td>
                <td><?= h($pharmacyInvoice->code) ?></td>
                <td><?= h($pharmacyInvoice->created) ?></td>
                <td><?= h($pharmacyInvoice->details) ?></td>
                <td><?= $pharmacyInvoice->has('pharmacy_operator') ? $this->Html->link($pharmacyInvoice->pharmacy_operator->id, ['controller' => 'PharmacyOperators', 'action' => 'view', $pharmacyInvoice->pharmacy_operator->id]) : '' ?></td>
                <td><?= $pharmacyInvoice->has('pharmacy_customer') ? $this->Html->link($pharmacyInvoice->pharmacy_customer->id, ['controller' => 'PharmacyCustomers', 'action' => 'view', $pharmacyInvoice->pharmacy_customer->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pharmacyInvoice->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pharmacyInvoice->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pharmacyInvoice->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pharmacyInvoice->id)]) ?>
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
