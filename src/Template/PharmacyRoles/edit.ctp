<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $pharmacyRole->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $pharmacyRole->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Pharmacy Roles'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Pharmacy Operators'), ['controller' => 'PharmacyOperators', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pharmacy Operator'), ['controller' => 'PharmacyOperators', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pharmacyRoles form large-9 medium-8 columns content">
    <?= $this->Form->create($pharmacyRole) ?>
    <fieldset>
        <legend><?= __('Edit Pharmacy Role') ?></legend>
        <?php
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
