<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Manager Operator Act Detail'), ['action' => 'edit', $managerOperatorActDetail->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Manager Operator Act Detail'), ['action' => 'delete', $managerOperatorActDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $managerOperatorActDetail->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Manager Operator Act Details'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Manager Operator Act Detail'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Manager Operators'), ['controller' => 'ManagerOperators', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Manager Operator'), ['controller' => 'ManagerOperators', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Manager Operator Acts'), ['controller' => 'ManagerOperatorActs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Manager Operator Act'), ['controller' => 'ManagerOperatorActs', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="managerOperatorActDetails view large-9 medium-8 columns content">
    <h3><?= h($managerOperatorActDetail->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Manager Operator') ?></th>
            <td><?= $managerOperatorActDetail->has('manager_operator') ? $this->Html->link($managerOperatorActDetail->manager_operator->id, ['controller' => 'ManagerOperators', 'action' => 'view', $managerOperatorActDetail->manager_operator->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Manager Operator Act') ?></th>
            <td><?= $managerOperatorActDetail->has('manager_operator_act') ? $this->Html->link($managerOperatorActDetail->manager_operator_act->id, ['controller' => 'ManagerOperatorActs', 'action' => 'view', $managerOperatorActDetail->manager_operator_act->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($managerOperatorActDetail->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($managerOperatorActDetail->created) ?></td>
        </tr>
    </table>
</div>
