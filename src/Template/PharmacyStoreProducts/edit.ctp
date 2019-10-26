<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $pharmacyStoreProduct->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $pharmacyStoreProduct->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Pharmacy Store Products'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Pharmacy Products'), ['controller' => 'PharmacyProducts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pharmacy Product'), ['controller' => 'PharmacyProducts', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pharmacy Invoice Details'), ['controller' => 'PharmacyInvoiceDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pharmacy Invoice Detail'), ['controller' => 'PharmacyInvoiceDetails', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pharmacy Store Product Levels'), ['controller' => 'PharmacyStoreProductLevels', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pharmacy Store Product Level'), ['controller' => 'PharmacyStoreProductLevels', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pharmacyStoreProducts form large-9 medium-8 columns content">
    <?= $this->Form->create($pharmacyStoreProduct) ?>
    <fieldset>
        <legend><?= __('Edit Pharmacy Store Product') ?></legend>
        <?php
            echo $this->Form->input('code');
            echo $this->Form->input('pharmacy_product_id', ['options' => $pharmacyProducts]);
            echo $this->Form->input('qty');
            echo $this->Form->input('unit_price');
            echo $this->Form->input('expiry_date');
            echo $this->Form->input('reorder_level');
            echo $this->Form->input('created_by');
            echo $this->Form->input('modified_by');
            echo $this->Form->input('deleted', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
