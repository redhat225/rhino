<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Pharmacy Product Categories'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Pharmacy Products'), ['controller' => 'PharmacyProducts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pharmacy Product'), ['controller' => 'PharmacyProducts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pharmacyProductCategories form large-9 medium-8 columns content">
    <?= $this->Form->create($pharmacyProductCategory) ?>
    <fieldset>
        <legend><?= __('Add Pharmacy Product Category') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('alias');
            echo $this->Form->input('details');
            echo $this->Form->input('parent');
            echo $this->Form->input('deleted', ['empty' => true]);
            echo $this->Form->input('created_by');
            echo $this->Form->input('updated_by');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
