<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pharmacy Store Product'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pharmacy Products'), ['controller' => 'PharmacyProducts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pharmacy Product'), ['controller' => 'PharmacyProducts', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pharmacy Invoice Details'), ['controller' => 'PharmacyInvoiceDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pharmacy Invoice Detail'), ['controller' => 'PharmacyInvoiceDetails', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pharmacy Store Product Levels'), ['controller' => 'PharmacyStoreProductLevels', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pharmacy Store Product Level'), ['controller' => 'PharmacyStoreProductLevels', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pharmacyStoreProducts index large-9 medium-8 columns content">
    <h3><?= __('Pharmacy Store Products') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('code') ?></th>
                <th><?= $this->Paginator->sort('pharmacy_product_id') ?></th>
                <th><?= $this->Paginator->sort('qty') ?></th>
                <th><?= $this->Paginator->sort('unit_price') ?></th>
                <th><?= $this->Paginator->sort('expiry_date') ?></th>
                <th><?= $this->Paginator->sort('reorder_level') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th><?= $this->Paginator->sort('created_by') ?></th>
                <th><?= $this->Paginator->sort('modified_by') ?></th>
                <th><?= $this->Paginator->sort('deleted') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pharmacyStoreProducts as $pharmacyStoreProduct): ?>
            <tr>
                <td><?= $this->Number->format($pharmacyStoreProduct->id) ?></td>
                <td><?= h($pharmacyStoreProduct->code) ?></td>
                <td><?= $pharmacyStoreProduct->has('pharmacy_product') ? $this->Html->link($pharmacyStoreProduct->pharmacy_product->name, ['controller' => 'PharmacyProducts', 'action' => 'view', $pharmacyStoreProduct->pharmacy_product->id]) : '' ?></td>
                <td><?= $this->Number->format($pharmacyStoreProduct->qty) ?></td>
                <td><?= $this->Number->format($pharmacyStoreProduct->unit_price) ?></td>
                <td><?= h($pharmacyStoreProduct->expiry_date) ?></td>
                <td><?= $this->Number->format($pharmacyStoreProduct->reorder_level) ?></td>
                <td><?= h($pharmacyStoreProduct->created) ?></td>
                <td><?= h($pharmacyStoreProduct->modified) ?></td>
                <td><?= $this->Number->format($pharmacyStoreProduct->created_by) ?></td>
                <td><?= $this->Number->format($pharmacyStoreProduct->modified_by) ?></td>
                <td><?= h($pharmacyStoreProduct->deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pharmacyStoreProduct->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pharmacyStoreProduct->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pharmacyStoreProduct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pharmacyStoreProduct->id)]) ?>
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
