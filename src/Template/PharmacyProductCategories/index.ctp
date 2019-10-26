<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pharmacy Product Category'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pharmacy Products'), ['controller' => 'PharmacyProducts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pharmacy Product'), ['controller' => 'PharmacyProducts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pharmacyProductCategories index large-9 medium-8 columns content">
    <h3><?= __('Pharmacy Product Categories') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('alias') ?></th>
                <th><?= $this->Paginator->sort('parent') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th><?= $this->Paginator->sort('deleted') ?></th>
                <th><?= $this->Paginator->sort('created_by') ?></th>
                <th><?= $this->Paginator->sort('updated_by') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pharmacyProductCategories as $pharmacyProductCategory): ?>
            <tr>
                <td><?= $this->Number->format($pharmacyProductCategory->id) ?></td>
                <td><?= h($pharmacyProductCategory->name) ?></td>
                <td><?= h($pharmacyProductCategory->alias) ?></td>
                <td><?= $this->Number->format($pharmacyProductCategory->parent) ?></td>
                <td><?= h($pharmacyProductCategory->created) ?></td>
                <td><?= h($pharmacyProductCategory->modified) ?></td>
                <td><?= h($pharmacyProductCategory->deleted) ?></td>
                <td><?= $this->Number->format($pharmacyProductCategory->created_by) ?></td>
                <td><?= $this->Number->format($pharmacyProductCategory->updated_by) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pharmacyProductCategory->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pharmacyProductCategory->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pharmacyProductCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pharmacyProductCategory->id)]) ?>
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
