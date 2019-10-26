<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Pharmacy Operator Acts'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Pharmacy Operator Act Details'), ['controller' => 'PharmacyOperatorActDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pharmacy Operator Act Detail'), ['controller' => 'PharmacyOperatorActDetails', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pharmacyOperatorActs form large-9 medium-8 columns content">
    <?= $this->Form->create($pharmacyOperatorAct) ?>
    <fieldset>
        <legend><?= __('Add Pharmacy Operator Act') ?></legend>
        <?php
            echo $this->Form->input('label_pharmacy_op_act');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
