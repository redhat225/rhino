<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Pharmacy Payment Methods'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Pharmacy Payments'), ['controller' => 'PharmacyPayments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pharmacy Payment'), ['controller' => 'PharmacyPayments', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pharmacyPaymentMethods form large-9 medium-8 columns content">
    <?= $this->Form->create($pharmacyPaymentMethod) ?>
    <fieldset>
        <legend><?= __('Add Pharmacy Payment Method') ?></legend>
        <?php
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
