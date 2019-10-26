<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pharmacy Store Product Level'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pharmacy Store Products'), ['controller' => 'PharmacyStoreProducts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pharmacy Store Product'), ['controller' => 'PharmacyStoreProducts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pharmacyStoreProductLevels index large-9 medium-8 columns content">
    <h3><?= __('Pharmacy Store Product Levels') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('qty') ?></th>
                <th><?= $this->Paginator->sort('pharmacy_store_product_id') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('ref_order') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pharmacyStoreProductLevels as $pharmacyStoreProductLevel): ?>
            <tr>
                <td><?= $this->Number->format($pharmacyStoreProductLevel->id) ?></td>
                <td><?= $this->Number->format($pharmacyStoreProductLevel->qty) ?></td>
                <td><?= $pharmacyStoreProductLevel->has('pharmacy_store_product') ? $this->Html->link($pharmacyStoreProductLevel->pharmacy_store_product->id, ['controller' => 'PharmacyStoreProducts', 'action' => 'view', $pharmacyStoreProductLevel->pharmacy_store_product->id]) : '' ?></td>
                <td><?= h($pharmacyStoreProductLevel->created) ?></td>
                <td><?= $this->Number->format($pharmacyStoreProductLevel->ref_order) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pharmacyStoreProductLevel->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pharmacyStoreProductLevel->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pharmacyStoreProductLevel->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pharmacyStoreProductLevel->id)]) ?>
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
