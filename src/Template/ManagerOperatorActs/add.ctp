<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Manager Operator Acts'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Manager Operator Act Details'), ['controller' => 'ManagerOperatorActDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Manager Operator Act Detail'), ['controller' => 'ManagerOperatorActDetails', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="managerOperatorActs form large-9 medium-8 columns content">
    <?= $this->Form->create($managerOperatorAct) ?>
    <fieldset>
        <legend><?= __('Add Manager Operator Act') ?></legend>
        <?php
            echo $this->Form->input('label_manager_op_act');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
