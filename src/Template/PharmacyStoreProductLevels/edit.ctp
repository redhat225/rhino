<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $pharmacyStoreProductLevel->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $pharmacyStoreProductLevel->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Pharmacy Store Product Levels'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Pharmacy Store Products'), ['controller' => 'PharmacyStoreProducts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pharmacy Store Product'), ['controller' => 'PharmacyStoreProducts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pharmacyStoreProductLevels form large-9 medium-8 columns content">
    <?= $this->Form->create($pharmacyStoreProductLevel) ?>
    <fieldset>
        <legend><?= __('Edit Pharmacy Store Product Level') ?></legend>
        <?php
            echo $this->Form->input('qty');
            echo $this->Form->input('pharmacy_store_product_id', ['options' => $pharmacyStoreProducts]);
            echo $this->Form->input('ref_order');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
