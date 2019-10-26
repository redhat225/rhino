<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pharmacy Institution'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Institutions'), ['controller' => 'Institutions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Institution'), ['controller' => 'Institutions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pharmacy Operators'), ['controller' => 'PharmacyOperators', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pharmacy Operator'), ['controller' => 'PharmacyOperators', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pharmacy Products'), ['controller' => 'PharmacyProducts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pharmacy Product'), ['controller' => 'PharmacyProducts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pharmacyInstitutions index large-9 medium-8 columns content">
    <h3><?= __('Pharmacy Institutions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('institution_id') ?></th>
                <th><?= $this->Paginator->sort('fullname') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pharmacyInstitutions as $pharmacyInstitution): ?>
            <tr>
                <td><?= $this->Number->format($pharmacyInstitution->id) ?></td>
                <td><?= $pharmacyInstitution->has('institution') ? $this->Html->link($pharmacyInstitution->institution->id, ['controller' => 'Institutions', 'action' => 'view', $pharmacyInstitution->institution->id]) : '' ?></td>
                <td><?= h($pharmacyInstitution->fullname) ?></td>
                <td><?= h($pharmacyInstitution->created) ?></td>
                <td><?= h($pharmacyInstitution->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pharmacyInstitution->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pharmacyInstitution->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pharmacyInstitution->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pharmacyInstitution->id)]) ?>
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
