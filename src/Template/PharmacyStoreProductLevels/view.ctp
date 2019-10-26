<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pharmacy Store Product Level'), ['action' => 'edit', $pharmacyStoreProductLevel->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pharmacy Store Product Level'), ['action' => 'delete', $pharmacyStoreProductLevel->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pharmacyStoreProductLevel->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pharmacy Store Product Levels'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pharmacy Store Product Level'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pharmacy Store Products'), ['controller' => 'PharmacyStoreProducts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pharmacy Store Product'), ['controller' => 'PharmacyStoreProducts', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pharmacyStoreProductLevels view large-9 medium-8 columns content">
    <h3><?= h($pharmacyStoreProductLevel->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Pharmacy Store Product') ?></th>
            <td><?= $pharmacyStoreProductLevel->has('pharmacy_store_product') ? $this->Html->link($pharmacyStoreProductLevel->pharmacy_store_product->id, ['controller' => 'PharmacyStoreProducts', 'action' => 'view', $pharmacyStoreProductLevel->pharmacy_store_product->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($pharmacyStoreProductLevel->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Qty') ?></th>
            <td><?= $this->Number->format($pharmacyStoreProductLevel->qty) ?></td>
        </tr>
        <tr>
            <th><?= __('Ref Order') ?></th>
            <td><?= $this->Number->format($pharmacyStoreProductLevel->ref_order) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($pharmacyStoreProductLevel->created) ?></td>
        </tr>
    </table>
</div>
