<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pharmacy Customer'), ['action' => 'edit', $pharmacyCustomer->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pharmacy Customer'), ['action' => 'delete', $pharmacyCustomer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pharmacyCustomer->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pharmacy Customers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pharmacy Customer'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pharmacy Invoices'), ['controller' => 'PharmacyInvoices', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pharmacy Invoice'), ['controller' => 'PharmacyInvoices', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pharmacyCustomers view large-9 medium-8 columns content">
    <h3><?= h($pharmacyCustomer->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Fullname') ?></th>
            <td><?= h($pharmacyCustomer->fullname) ?></td>
        </tr>
        <tr>
            <th><?= __('Code') ?></th>
            <td><?= h($pharmacyCustomer->code) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($pharmacyCustomer->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Type') ?></th>
            <td><?= $this->Number->format($pharmacyCustomer->type) ?></td>
        </tr>
        <tr>
            <th><?= __('Ispatient') ?></th>
            <td><?= $this->Number->format($pharmacyCustomer->ispatient) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Pharmacy Invoices') ?></h4>
        <?php if (!empty($pharmacyCustomer->pharmacy_invoices)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Code') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Details') ?></th>
                <th><?= __('Pharmacy Operator Id') ?></th>
                <th><?= __('Pharmacy Customer Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($pharmacyCustomer->pharmacy_invoices as $pharmacyInvoices): ?>
            <tr>
                <td><?= h($pharmacyInvoices->id) ?></td>
                <td><?= h($pharmacyInvoices->code) ?></td>
                <td><?= h($pharmacyInvoices->created) ?></td>
                <td><?= h($pharmacyInvoices->details) ?></td>
                <td><?= h($pharmacyInvoices->pharmacy_operator_id) ?></td>
                <td><?= h($pharmacyInvoices->pharmacy_customer_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PharmacyInvoices', 'action' => 'view', $pharmacyInvoices->]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PharmacyInvoices', 'action' => 'edit', $pharmacyInvoices->]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PharmacyInvoices', 'action' => 'delete', $pharmacyInvoices->], ['confirm' => __('Are you sure you want to delete # {0}?', $pharmacyInvoices->)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
