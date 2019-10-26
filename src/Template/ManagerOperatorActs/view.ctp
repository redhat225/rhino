<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Manager Operator Act'), ['action' => 'edit', $managerOperatorAct->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Manager Operator Act'), ['action' => 'delete', $managerOperatorAct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $managerOperatorAct->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Manager Operator Acts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Manager Operator Act'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Manager Operator Act Details'), ['controller' => 'ManagerOperatorActDetails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Manager Operator Act Detail'), ['controller' => 'ManagerOperatorActDetails', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="managerOperatorActs view large-9 medium-8 columns content">
    <h3><?= h($managerOperatorAct->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Label Manager Op Act') ?></th>
            <td><?= h($managerOperatorAct->label_manager_op_act) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($managerOperatorAct->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Manager Operator Act Details') ?></h4>
        <?php if (!empty($managerOperatorAct->manager_operator_act_details)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Manager Operator Id') ?></th>
                <th scope="col"><?= __('Manager Operator Act Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($managerOperatorAct->manager_operator_act_details as $managerOperatorActDetails): ?>
            <tr>
                <td><?= h($managerOperatorActDetails->id) ?></td>
                <td><?= h($managerOperatorActDetails->manager_operator_id) ?></td>
                <td><?= h($managerOperatorActDetails->manager_operator_act_id) ?></td>
                <td><?= h($managerOperatorActDetails->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ManagerOperatorActDetails', 'action' => 'view', $managerOperatorActDetails->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ManagerOperatorActDetails', 'action' => 'edit', $managerOperatorActDetails->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ManagerOperatorActDetails', 'action' => 'delete', $managerOperatorActDetails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $managerOperatorActDetails->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
