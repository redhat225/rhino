<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Pharmacy Products'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Pharmacy Product Categories'), ['controller' => 'PharmacyProductCategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pharmacy Product Category'), ['controller' => 'PharmacyProductCategories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pharmacy Institutions'), ['controller' => 'PharmacyInstitutions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pharmacy Institution'), ['controller' => 'PharmacyInstitutions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pharmacy Product Prices'), ['controller' => 'PharmacyProductPrices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pharmacy Product Price'), ['controller' => 'PharmacyProductPrices', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pharmacy Store Products'), ['controller' => 'PharmacyStoreProducts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pharmacy Store Product'), ['controller' => 'PharmacyStoreProducts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pharmacyProducts form large-9 medium-8 columns content">
    <?= $this->Form->create($pharmacyProduct) ?>
    <fieldset>
        <legend><?= __('Add Pharmacy Product') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('alias');
            echo $this->Form->input('details');
            echo $this->Form->input('picture');
            echo $this->Form->input('deleted', ['empty' => true]);
            echo $this->Form->input('created_by');
            echo $this->Form->input('updated_by');
            echo $this->Form->input('pharmacy_product_category_id', ['options' => $pharmacyProductCategories]);
            echo $this->Form->input('pharmacy_institution_id', ['options' => $pharmacyInstitutions]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
