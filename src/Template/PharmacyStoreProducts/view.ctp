<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pharmacy Store Product'), ['action' => 'edit', $pharmacyStoreProduct->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pharmacy Store Product'), ['action' => 'delete', $pharmacyStoreProduct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pharmacyStoreProduct->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pharmacy Store Products'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pharmacy Store Product'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pharmacy Products'), ['controller' => 'PharmacyProducts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pharmacy Product'), ['controller' => 'PharmacyProducts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pharmacy Invoice Details'), ['controller' => 'PharmacyInvoiceDetails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pharmacy Invoice Detail'), ['controller' => 'PharmacyInvoiceDetails', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pharmacy Store Product Levels'), ['controller' => 'PharmacyStoreProductLevels', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pharmacy Store Product Level'), ['controller' => 'PharmacyStoreProductLevels', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pharmacyStoreProducts view large-9 medium-8 columns content">
    <h3><?= h($pharmacyStoreProduct->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Code') ?></th>
            <td><?= h($pharmacyStoreProduct->code) ?></td>
        </tr>
        <tr>
            <th><?= __('Pharmacy Product') ?></th>
            <td><?= $pharmacyStoreProduct->has('pharmacy_product') ? $this->Html->link($pharmacyStoreProduct->pharmacy_product->name, ['controller' => 'PharmacyProducts', 'action' => 'view', $pharmacyStoreProduct->pharmacy_product->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($pharmacyStoreProduct->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Qty') ?></th>
            <td><?= $this->Number->format($pharmacyStoreProduct->qty) ?></td>
        </tr>
        <tr>
            <th><?= __('Unit Price') ?></th>
            <td><?= $this->Number->format($pharmacyStoreProduct->unit_price) ?></td>
        </tr>
        <tr>
            <th><?= __('Reorder Level') ?></th>
            <td><?= $this->Number->format($pharmacyStoreProduct->reorder_level) ?></td>
        </tr>
        <tr>
            <th><?= __('Created By') ?></th>
            <td><?= $this->Number->format($pharmacyStoreProduct->created_by) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified By') ?></th>
            <td><?= $this->Number->format($pharmacyStoreProduct->modified_by) ?></td>
        </tr>
        <tr>
            <th><?= __('Expiry Date') ?></th>
            <td><?= h($pharmacyStoreProduct->expiry_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($pharmacyStoreProduct->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($pharmacyStoreProduct->modified) ?></td>
        </tr>
        <tr>
            <th><?= __('Deleted') ?></th>
            <td><?= h($pharmacyStoreProduct->deleted) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Pharmacy Invoice Details') ?></h4>
        <?php if (!empty($pharmacyStoreProduct->pharmacy_invoice_details)): ?>
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
            <?php foreach ($pharmacyStoreProduct->pharmacy_invoice_details as $pharmacyInvoiceDetails): ?>
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
        <h4><?= __('Related Pharmacy Store Product Levels') ?></h4>
        <?php if (!empty($pharmacyStoreProduct->pharmacy_store_product_levels)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Qty') ?></th>
                <th><?= __('Pharmacy Store Product Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Ref Order') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($pharmacyStoreProduct->pharmacy_store_product_levels as $pharmacyStoreProductLevels): ?>
            <tr>
                <td><?= h($pharmacyStoreProductLevels->id) ?></td>
                <td><?= h($pharmacyStoreProductLevels->qty) ?></td>
                <td><?= h($pharmacyStoreProductLevels->pharmacy_store_product_id) ?></td>
                <td><?= h($pharmacyStoreProductLevels->created) ?></td>
                <td><?= h($pharmacyStoreProductLevels->ref_order) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PharmacyStoreProductLevels', 'action' => 'view', $pharmacyStoreProductLevels->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PharmacyStoreProductLevels', 'action' => 'edit', $pharmacyStoreProductLevels->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PharmacyStoreProductLevels', 'action' => 'delete', $pharmacyStoreProductLevels->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pharmacyStoreProductLevels->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
