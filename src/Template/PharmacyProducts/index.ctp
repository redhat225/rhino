<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pharmacy Product'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pharmacy Product Categories'), ['controller' => 'PharmacyProductCategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pharmacy Product Category'), ['controller' => 'PharmacyProductCategories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pharmacy Institutions'), ['controller' => 'PharmacyInstitutions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pharmacy Institution'), ['controller' => 'PharmacyInstitutions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pharmacy Product Prices'), ['controller' => 'PharmacyProductPrices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pharmacy Product Price'), ['controller' => 'PharmacyProductPrices', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pharmacy Store Products'), ['controller' => 'PharmacyStoreProducts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pharmacy Store Product'), ['controller' => 'PharmacyStoreProducts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pharmacyProducts index large-9 medium-8 columns content">
    <h3><?= __('Pharmacy Products') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('alias') ?></th>
                <th><?= $this->Paginator->sort('picture') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('deleted') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th><?= $this->Paginator->sort('created_by') ?></th>
                <th><?= $this->Paginator->sort('updated_by') ?></th>
                <th><?= $this->Paginator->sort('pharmacy_product_category_id') ?></th>
                <th><?= $this->Paginator->sort('pharmacy_institution_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pharmacyProducts as $pharmacyProduct): ?>
            <tr>
                <td><?= $this->Number->format($pharmacyProduct->id) ?></td>
                <td><?= h($pharmacyProduct->name) ?></td>
                <td><?= h($pharmacyProduct->alias) ?></td>
                <td><?= h($pharmacyProduct->picture) ?></td>
                <td><?= h($pharmacyProduct->created) ?></td>
                <td><?= h($pharmacyProduct->deleted) ?></td>
                <td><?= h($pharmacyProduct->modified) ?></td>
                <td><?= $this->Number->format($pharmacyProduct->created_by) ?></td>
                <td><?= $this->Number->format($pharmacyProduct->updated_by) ?></td>
                <td><?= $pharmacyProduct->has('pharmacy_product_category') ? $this->Html->link($pharmacyProduct->pharmacy_product_category->name, ['controller' => 'PharmacyProductCategories', 'action' => 'view', $pharmacyProduct->pharmacy_product_category->id]) : '' ?></td>
                <td><?= $pharmacyProduct->has('pharmacy_institution') ? $this->Html->link($pharmacyProduct->pharmacy_institution->id, ['controller' => 'PharmacyInstitutions', 'action' => 'view', $pharmacyProduct->pharmacy_institution->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pharmacyProduct->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pharmacyProduct->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pharmacyProduct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pharmacyProduct->id)]) ?>
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
