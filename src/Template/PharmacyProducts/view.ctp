<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pharmacy Product'), ['action' => 'edit', $pharmacyProduct->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pharmacy Product'), ['action' => 'delete', $pharmacyProduct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pharmacyProduct->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pharmacy Products'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pharmacy Product'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pharmacy Product Categories'), ['controller' => 'PharmacyProductCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pharmacy Product Category'), ['controller' => 'PharmacyProductCategories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pharmacy Institutions'), ['controller' => 'PharmacyInstitutions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pharmacy Institution'), ['controller' => 'PharmacyInstitutions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pharmacy Product Prices'), ['controller' => 'PharmacyProductPrices', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pharmacy Product Price'), ['controller' => 'PharmacyProductPrices', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pharmacy Store Products'), ['controller' => 'PharmacyStoreProducts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pharmacy Store Product'), ['controller' => 'PharmacyStoreProducts', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pharmacyProducts view large-9 medium-8 columns content">
    <h3><?= h($pharmacyProduct->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($pharmacyProduct->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Alias') ?></th>
            <td><?= h($pharmacyProduct->alias) ?></td>
        </tr>
        <tr>
            <th><?= __('Picture') ?></th>
            <td><?= h($pharmacyProduct->picture) ?></td>
        </tr>
        <tr>
            <th><?= __('Pharmacy Product Category') ?></th>
            <td><?= $pharmacyProduct->has('pharmacy_product_category') ? $this->Html->link($pharmacyProduct->pharmacy_product_category->name, ['controller' => 'PharmacyProductCategories', 'action' => 'view', $pharmacyProduct->pharmacy_product_category->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Pharmacy Institution') ?></th>
            <td><?= $pharmacyProduct->has('pharmacy_institution') ? $this->Html->link($pharmacyProduct->pharmacy_institution->id, ['controller' => 'PharmacyInstitutions', 'action' => 'view', $pharmacyProduct->pharmacy_institution->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($pharmacyProduct->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created By') ?></th>
            <td><?= $this->Number->format($pharmacyProduct->created_by) ?></td>
        </tr>
        <tr>
            <th><?= __('Updated By') ?></th>
            <td><?= $this->Number->format($pharmacyProduct->updated_by) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($pharmacyProduct->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Deleted') ?></th>
            <td><?= h($pharmacyProduct->deleted) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($pharmacyProduct->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Details') ?></h4>
        <?= $this->Text->autoParagraph(h($pharmacyProduct->details)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Pharmacy Product Prices') ?></h4>
        <?php if (!empty($pharmacyProduct->pharmacy_product_prices)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Unit Price') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Created By') ?></th>
                <th><?= __('Modified By') ?></th>
                <th><?= __('Pharmacy Product Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($pharmacyProduct->pharmacy_product_prices as $pharmacyProductPrices): ?>
            <tr>
                <td><?= h($pharmacyProductPrices->id) ?></td>
                <td><?= h($pharmacyProductPrices->unit_price) ?></td>
                <td><?= h($pharmacyProductPrices->created) ?></td>
                <td><?= h($pharmacyProductPrices->modified) ?></td>
                <td><?= h($pharmacyProductPrices->created_by) ?></td>
                <td><?= h($pharmacyProductPrices->modified_by) ?></td>
                <td><?= h($pharmacyProductPrices->pharmacy_product_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PharmacyProductPrices', 'action' => 'view', $pharmacyProductPrices->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PharmacyProductPrices', 'action' => 'edit', $pharmacyProductPrices->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PharmacyProductPrices', 'action' => 'delete', $pharmacyProductPrices->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pharmacyProductPrices->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Pharmacy Store Products') ?></h4>
        <?php if (!empty($pharmacyProduct->pharmacy_store_products)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Code') ?></th>
                <th><?= __('Pharmacy Product Id') ?></th>
                <th><?= __('Qty') ?></th>
                <th><?= __('Unit Price') ?></th>
                <th><?= __('Expiry Date') ?></th>
                <th><?= __('Reorder Level') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Created By') ?></th>
                <th><?= __('Modified By') ?></th>
                <th><?= __('Deleted') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($pharmacyProduct->pharmacy_store_products as $pharmacyStoreProducts): ?>
            <tr>
                <td><?= h($pharmacyStoreProducts->id) ?></td>
                <td><?= h($pharmacyStoreProducts->code) ?></td>
                <td><?= h($pharmacyStoreProducts->pharmacy_product_id) ?></td>
                <td><?= h($pharmacyStoreProducts->qty) ?></td>
                <td><?= h($pharmacyStoreProducts->unit_price) ?></td>
                <td><?= h($pharmacyStoreProducts->expiry_date) ?></td>
                <td><?= h($pharmacyStoreProducts->reorder_level) ?></td>
                <td><?= h($pharmacyStoreProducts->created) ?></td>
                <td><?= h($pharmacyStoreProducts->modified) ?></td>
                <td><?= h($pharmacyStoreProducts->created_by) ?></td>
                <td><?= h($pharmacyStoreProducts->modified_by) ?></td>
                <td><?= h($pharmacyStoreProducts->deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PharmacyStoreProducts', 'action' => 'view', $pharmacyStoreProducts->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PharmacyStoreProducts', 'action' => 'edit', $pharmacyStoreProducts->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PharmacyStoreProducts', 'action' => 'delete', $pharmacyStoreProducts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pharmacyStoreProducts->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
