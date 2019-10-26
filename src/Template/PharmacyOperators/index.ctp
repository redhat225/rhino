<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pharmacy Operator'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List People'), ['controller' => 'People', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Person'), ['controller' => 'People', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pharmacy Institutions'), ['controller' => 'PharmacyInstitutions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pharmacy Institution'), ['controller' => 'PharmacyInstitutions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pharmacy Roles'), ['controller' => 'PharmacyRoles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pharmacy Role'), ['controller' => 'PharmacyRoles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pharmacy Invoices'), ['controller' => 'PharmacyInvoices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pharmacy Invoice'), ['controller' => 'PharmacyInvoices', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pharmacyOperators index large-9 medium-8 columns content">
    <h3><?= __('Pharmacy Operators') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('username') ?></th>
                <th><?= $this->Paginator->sort('people_id') ?></th>
                <th><?= $this->Paginator->sort('pharmacy_institution_id') ?></th>
                <th><?= $this->Paginator->sort('pharmacy_role_id') ?></th>
                <th><?= $this->Paginator->sort('email') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pharmacyOperators as $pharmacyOperator): ?>
            <tr>
                <td><?= $this->Number->format($pharmacyOperator->id) ?></td>
                <td><?= h($pharmacyOperator->username) ?></td>
                <td><?= $pharmacyOperator->has('person') ? $this->Html->link($pharmacyOperator->person->id, ['controller' => 'People', 'action' => 'view', $pharmacyOperator->person->id]) : '' ?></td>
                <td><?= $pharmacyOperator->has('pharmacy_institution') ? $this->Html->link($pharmacyOperator->pharmacy_institution->id, ['controller' => 'PharmacyInstitutions', 'action' => 'view', $pharmacyOperator->pharmacy_institution->id]) : '' ?></td>
                <td><?= $pharmacyOperator->has('pharmacy_role') ? $this->Html->link($pharmacyOperator->pharmacy_role->name, ['controller' => 'PharmacyRoles', 'action' => 'view', $pharmacyOperator->pharmacy_role->id]) : '' ?></td>
                <td><?= h($pharmacyOperator->email) ?></td>
                <td><?= h($pharmacyOperator->created) ?></td>
                <td><?= h($pharmacyOperator->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pharmacyOperator->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pharmacyOperator->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pharmacyOperator->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pharmacyOperator->id)]) ?>
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
