<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Pharmacy Operator Act Details'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Pharmacy Operator Acts'), ['controller' => 'PharmacyOperatorActs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pharmacy Operator Act'), ['controller' => 'PharmacyOperatorActs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pharmacy Operators'), ['controller' => 'PharmacyOperators', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pharmacy Operator'), ['controller' => 'PharmacyOperators', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pharmacyOperatorActDetails form large-9 medium-8 columns content">
    <?= $this->Form->create($pharmacyOperatorActDetail) ?>
    <fieldset>
        <legend><?= __('Add Pharmacy Operator Act Detail') ?></legend>
        <?php
            echo $this->Form->input('pharmacy_operator_act_id', ['options' => $pharmacyOperatorActs]);
            echo $this->Form->input('pharmacy_operator_id', ['options' => $pharmacyOperators]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
