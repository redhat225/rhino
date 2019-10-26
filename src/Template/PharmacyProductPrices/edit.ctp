<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $pharmacyProductPrice->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $pharmacyProductPrice->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Pharmacy Product Prices'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Pharmacy Products'), ['controller' => 'PharmacyProducts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pharmacy Product'), ['controller' => 'PharmacyProducts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pharmacyProductPrices form large-9 medium-8 columns content">
    <?= $this->Form->create($pharmacyProductPrice) ?>
    <fieldset>
        <legend><?= __('Edit Pharmacy Product Price') ?></legend>
        <?php
            echo $this->Form->input('unit_price');
            echo $this->Form->input('created_by');
            echo $this->Form->input('modified_by');
            echo $this->Form->input('pharmacy_product_id', ['options' => $pharmacyProducts]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
