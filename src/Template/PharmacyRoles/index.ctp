<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pharmacy Role'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pharmacy Operators'), ['controller' => 'PharmacyOperators', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pharmacy Operator'), ['controller' => 'PharmacyOperators', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pharmacyRoles index large-9 medium-8 columns content">
    <h3><?= __('Pharmacy Roles') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pharmacyRoles as $pharmacyRole): ?>
            <tr>
                <td><?= $this->Number->format($pharmacyRole->id) ?></td>
                <td><?= h($pharmacyRole->name) ?></td>
                <td><?= h($pharmacyRole->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pharmacyRole->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pharmacyRole->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pharmacyRole->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pharmacyRole->id)]) ?>
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
