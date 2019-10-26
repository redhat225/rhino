<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pharmacy Product Price'), ['action' => 'edit', $pharmacyProductPrice->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pharmacy Product Price'), ['action' => 'delete', $pharmacyProductPrice->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pharmacyProductPrice->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pharmacy Product Prices'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pharmacy Product Price'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pharmacy Products'), ['controller' => 'PharmacyProducts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pharmacy Product'), ['controller' => 'PharmacyProducts', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pharmacyProductPrices view large-9 medium-8 columns content">
    <h3><?= h($pharmacyProductPrice->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Pharmacy Product') ?></th>
            <td><?= $pharmacyProductPrice->has('pharmacy_product') ? $this->Html->link($pharmacyProductPrice->pharmacy_product->name, ['controller' => 'PharmacyProducts', 'action' => 'view', $pharmacyProductPrice->pharmacy_product->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($pharmacyProductPrice->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Unit Price') ?></th>
            <td><?= $this->Number->format($pharmacyProductPrice->unit_price) ?></td>
        </tr>
        <tr>
            <th><?= __('Created By') ?></th>
            <td><?= $this->Number->format($pharmacyProductPrice->created_by) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified By') ?></th>
            <td><?= $this->Number->format($pharmacyProductPrice->modified_by) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($pharmacyProductPrice->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($pharmacyProductPrice->modified) ?></td>
        </tr>
    </table>
</div>
