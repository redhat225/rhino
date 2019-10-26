<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pharmacy Product Category'), ['action' => 'edit', $pharmacyProductCategory->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pharmacy Product Category'), ['action' => 'delete', $pharmacyProductCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pharmacyProductCategory->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pharmacy Product Categories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pharmacy Product Category'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pharmacy Products'), ['controller' => 'PharmacyProducts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pharmacy Product'), ['controller' => 'PharmacyProducts', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pharmacyProductCategories view large-9 medium-8 columns content">
    <h3><?= h($pharmacyProductCategory->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($pharmacyProductCategory->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Alias') ?></th>
            <td><?= h($pharmacyProductCategory->alias) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($pharmacyProductCategory->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Parent') ?></th>
            <td><?= $this->Number->format($pharmacyProductCategory->parent) ?></td>
        </tr>
        <tr>
            <th><?= __('Created By') ?></th>
            <td><?= $this->Number->format($pharmacyProductCategory->created_by) ?></td>
        </tr>
        <tr>
            <th><?= __('Updated By') ?></th>
            <td><?= $this->Number->format($pharmacyProductCategory->updated_by) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($pharmacyProductCategory->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($pharmacyProductCategory->modified) ?></td>
        </tr>
        <tr>
            <th><?= __('Deleted') ?></th>
            <td><?= h($pharmacyProductCategory->deleted) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Details') ?></h4>
        <?= $this->Text->autoParagraph(h($pharmacyProductCategory->details)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Pharmacy Products') ?></h4>
        <?php if (!empty($pharmacyProductCategory->pharmacy_products)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Alias') ?></th>
                <th><?= __('Details') ?></th>
                <th><?= __('Picture') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Deleted') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Created By') ?></th>
                <th><?= __('Updated By') ?></th>
                <th><?= __('Pharmacy Product Category Id') ?></th>
                <th><?= __('Pharmacy Institution Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($pharmacyProductCategory->pharmacy_products as $pharmacyProducts): ?>
            <tr>
                <td><?= h($pharmacyProducts->id) ?></td>
                <td><?= h($pharmacyProducts->name) ?></td>
                <td><?= h($pharmacyProducts->alias) ?></td>
                <td><?= h($pharmacyProducts->details) ?></td>
                <td><?= h($pharmacyProducts->picture) ?></td>
                <td><?= h($pharmacyProducts->created) ?></td>
                <td><?= h($pharmacyProducts->deleted) ?></td>
                <td><?= h($pharmacyProducts->modified) ?></td>
                <td><?= h($pharmacyProducts->created_by) ?></td>
                <td><?= h($pharmacyProducts->updated_by) ?></td>
                <td><?= h($pharmacyProducts->pharmacy_product_category_id) ?></td>
                <td><?= h($pharmacyProducts->pharmacy_institution_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PharmacyProducts', 'action' => 'view', $pharmacyProducts->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PharmacyProducts', 'action' => 'edit', $pharmacyProducts->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PharmacyProducts', 'action' => 'delete', $pharmacyProducts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pharmacyProducts->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
