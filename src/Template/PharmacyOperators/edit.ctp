<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $pharmacyOperator->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $pharmacyOperator->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Pharmacy Operators'), ['action' => 'index']) ?></li>
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
<div class="pharmacyOperators form large-9 medium-8 columns content">
    <?= $this->Form->create($pharmacyOperator) ?>
    <fieldset>
        <legend><?= __('Edit Pharmacy Operator') ?></legend>
        <?php
            echo $this->Form->input('code');
            echo $this->Form->input('username');
            echo $this->Form->input('password');
            echo $this->Form->input('people_id', ['options' => $people]);
            echo $this->Form->input('pharmacy_institution_id', ['options' => $pharmacyInstitutions]);
            echo $this->Form->input('pharmacy_role_id', ['options' => $pharmacyRoles]);
            echo $this->Form->input('avatar');
            echo $this->Form->input('email');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
