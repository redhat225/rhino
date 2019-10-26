<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pharmacy Operator'), ['action' => 'edit', $pharmacyOperator->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pharmacy Operator'), ['action' => 'delete', $pharmacyOperator->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pharmacyOperator->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pharmacy Operators'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pharmacy Operator'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List People'), ['controller' => 'People', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Person'), ['controller' => 'People', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pharmacy Institutions'), ['controller' => 'PharmacyInstitutions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pharmacy Institution'), ['controller' => 'PharmacyInstitutions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pharmacy Roles'), ['controller' => 'PharmacyRoles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pharmacy Role'), ['controller' => 'PharmacyRoles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pharmacy Invoices'), ['controller' => 'PharmacyInvoices', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pharmacy Invoice'), ['controller' => 'PharmacyInvoices', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pharmacyOperators view large-9 medium-8 columns content">
    <h3><?= h($pharmacyOperator->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Username') ?></th>
            <td><?= h($pharmacyOperator->username) ?></td>
        </tr>
        <tr>
            <th><?= __('Person') ?></th>
            <td><?= $pharmacyOperator->has('person') ? $this->Html->link($pharmacyOperator->person->id, ['controller' => 'People', 'action' => 'view', $pharmacyOperator->person->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Pharmacy Institution') ?></th>
            <td><?= $pharmacyOperator->has('pharmacy_institution') ? $this->Html->link($pharmacyOperator->pharmacy_institution->id, ['controller' => 'PharmacyInstitutions', 'action' => 'view', $pharmacyOperator->pharmacy_institution->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Pharmacy Role') ?></th>
            <td><?= $pharmacyOperator->has('pharmacy_role') ? $this->Html->link($pharmacyOperator->pharmacy_role->name, ['controller' => 'PharmacyRoles', 'action' => 'view', $pharmacyOperator->pharmacy_role->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($pharmacyOperator->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($pharmacyOperator->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($pharmacyOperator->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($pharmacyOperator->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Code') ?></h4>
        <?= $this->Text->autoParagraph(h($pharmacyOperator->code)); ?>
    </div>
    <div class="row">
        <h4><?= __('Password') ?></h4>
        <?= $this->Text->autoParagraph(h($pharmacyOperator->password)); ?>
    </div>
    <div class="row">
        <h4><?= __('Avatar') ?></h4>
        <?= $this->Text->autoParagraph(h($pharmacyOperator->avatar)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Pharmacy Invoices') ?></h4>
        <?php if (!empty($pharmacyOperator->pharmacy_invoices)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Code') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Details') ?></th>
                <th><?= __('Pharmacy Operator Id') ?></th>
                <th><?= __('Pharmacy Customer Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($pharmacyOperator->pharmacy_invoices as $pharmacyInvoices): ?>
            <tr>
                <td><?= h($pharmacyInvoices->id) ?></td>
                <td><?= h($pharmacyInvoices->code) ?></td>
                <td><?= h($pharmacyInvoices->created) ?></td>
                <td><?= h($pharmacyInvoices->details) ?></td>
                <td><?= h($pharmacyInvoices->pharmacy_operator_id) ?></td>
                <td><?= h($pharmacyInvoices->pharmacy_customer_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PharmacyInvoices', 'action' => 'view', $pharmacyInvoices->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PharmacyInvoices', 'action' => 'edit', $pharmacyInvoices->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PharmacyInvoices', 'action' => 'delete', $pharmacyInvoices->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pharmacyInvoices->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
