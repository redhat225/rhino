<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pharmacy Product Price'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pharmacy Products'), ['controller' => 'PharmacyProducts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pharmacy Product'), ['controller' => 'PharmacyProducts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pharmacyProductPrices index large-9 medium-8 columns content">
    <h3><?= __('Pharmacy Product Prices') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('unit_price') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th><?= $this->Paginator->sort('created_by') ?></th>
                <th><?= $this->Paginator->sort('modified_by') ?></th>
                <th><?= $this->Paginator->sort('pharmacy_product_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pharmacyProductPrices as $pharmacyProductPrice): ?>
            <tr>
                <td><?= $this->Number->format($pharmacyProductPrice->id) ?></td>
                <td><?= $this->Number->format($pharmacyProductPrice->unit_price) ?></td>
                <td><?= h($pharmacyProductPrice->created) ?></td>
                <td><?= h($pharmacyProductPrice->modified) ?></td>
                <td><?= $this->Number->format($pharmacyProductPrice->created_by) ?></td>
                <td><?= $this->Number->format($pharmacyProductPrice->modified_by) ?></td>
                <td><?= $pharmacyProductPrice->has('pharmacy_product') ? $this->Html->link($pharmacyProductPrice->pharmacy_product->name, ['controller' => 'PharmacyProducts', 'action' => 'view', $pharmacyProductPrice->pharmacy_product->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pharmacyProductPrice->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pharmacyProductPrice->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pharmacyProductPrice->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pharmacyProductPrice->id)]) ?>
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
