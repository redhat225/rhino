<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pharmacy Role'), ['action' => 'edit', $pharmacyRole->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pharmacy Role'), ['action' => 'delete', $pharmacyRole->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pharmacyRole->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pharmacy Roles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pharmacy Role'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pharmacy Operators'), ['controller' => 'PharmacyOperators', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pharmacy Operator'), ['controller' => 'PharmacyOperators', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pharmacyRoles view large-9 medium-8 columns content">
    <h3><?= h($pharmacyRole->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($pharmacyRole->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($pharmacyRole->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($pharmacyRole->created) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Pharmacy Operators') ?></h4>
        <?php if (!empty($pharmacyRole->pharmacy_operators)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Code') ?></th>
                <th><?= __('Username') ?></th>
                <th><?= __('Password') ?></th>
                <th><?= __('People Id') ?></th>
                <th><?= __('Pharmacy Institution Id') ?></th>
                <th><?= __('Pharmacy Role Id') ?></th>
                <th><?= __('Avatar') ?></th>
                <th><?= __('Email') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($pharmacyRole->pharmacy_operators as $pharmacyOperators): ?>
            <tr>
                <td><?= h($pharmacyOperators->id) ?></td>
                <td><?= h($pharmacyOperators->code) ?></td>
                <td><?= h($pharmacyOperators->username) ?></td>
                <td><?= h($pharmacyOperators->password) ?></td>
                <td><?= h($pharmacyOperators->people_id) ?></td>
                <td><?= h($pharmacyOperators->pharmacy_institution_id) ?></td>
                <td><?= h($pharmacyOperators->pharmacy_role_id) ?></td>
                <td><?= h($pharmacyOperators->avatar) ?></td>
                <td><?= h($pharmacyOperators->email) ?></td>
                <td><?= h($pharmacyOperators->created) ?></td>
                <td><?= h($pharmacyOperators->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PharmacyOperators', 'action' => 'view', $pharmacyOperators->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PharmacyOperators', 'action' => 'edit', $pharmacyOperators->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PharmacyOperators', 'action' => 'delete', $pharmacyOperators->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pharmacyOperators->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
