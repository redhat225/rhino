<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $managerOperatorActDetail->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $managerOperatorActDetail->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Manager Operator Act Details'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Manager Operators'), ['controller' => 'ManagerOperators', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Manager Operator'), ['controller' => 'ManagerOperators', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Manager Operator Acts'), ['controller' => 'ManagerOperatorActs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Manager Operator Act'), ['controller' => 'ManagerOperatorActs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="managerOperatorActDetails form large-9 medium-8 columns content">
    <?= $this->Form->create($managerOperatorActDetail) ?>
    <fieldset>
        <legend><?= __('Edit Manager Operator Act Detail') ?></legend>
        <?php
            echo $this->Form->input('manager_operator_id', ['options' => $managerOperators]);
            echo $this->Form->input('manager_operator_act_id', ['options' => $managerOperatorActs]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
