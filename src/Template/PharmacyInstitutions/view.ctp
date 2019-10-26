<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pharmacy Institution'), ['action' => 'edit', $pharmacyInstitution->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pharmacy Institution'), ['action' => 'delete', $pharmacyInstitution->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pharmacyInstitution->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pharmacy Institutions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pharmacy Institution'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Institutions'), ['controller' => 'Institutions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Institution'), ['controller' => 'Institutions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pharmacy Operators'), ['controller' => 'PharmacyOperators', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pharmacy Operator'), ['controller' => 'PharmacyOperators', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pharmacy Products'), ['controller' => 'PharmacyProducts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pharmacy Product'), ['controller' => 'PharmacyProducts', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pharmacyInstitutions view large-9 medium-8 columns content">
    <h3><?= h($pharmacyInstitution->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Institution') ?></th>
            <td><?= $pharmacyInstitution->has('institution') ? $this->Html->link($pharmacyInstitution->institution->id, ['controller' => 'Institutions', 'action' => 'view', $pharmacyInstitution->institution->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Fullname') ?></th>
            <td><?= h($pharmacyInstitution->fullname) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($pharmacyInstitution->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($pharmacyInstitution->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($pharmacyInstitution->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Pharmacy Operators') ?></h4>
        <?php if (!empty($pharmacyInstitution->pharmacy_operators)): ?>
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
            <?php foreach ($pharmacyInstitution->pharmacy_operators as $pharmacyOperators): ?>
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
    <div class="related">
        <h4><?= __('Related Pharmacy Products') ?></h4>
        <?php if (!empty($pharmacyInstitution->pharmacy_products)): ?>
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
            <?php foreach ($pharmacyInstitution->pharmacy_products as $pharmacyProducts): ?>
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
