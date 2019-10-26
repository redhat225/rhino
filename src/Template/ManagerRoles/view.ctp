<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Manager Role'), ['action' => 'edit', $managerRole->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Manager Role'), ['action' => 'delete', $managerRole->id], ['confirm' => __('Are you sure you want to delete # {0}?', $managerRole->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Manager Roles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Manager Role'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Manager Role Details'), ['controller' => 'ManagerRoleDetails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Manager Role Detail'), ['controller' => 'ManagerRoleDetails', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="managerRoles view large-9 medium-8 columns content">
    <h3><?= h($managerRole->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Label Role') ?></th>
            <td><?= h($managerRole->label_role) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($managerRole->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Manager Role Details') ?></h4>
        <?php if (!empty($managerRole->manager_role_details)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Manager Role Id') ?></th>
                <th scope="col"><?= __('Manager Operator Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($managerRole->manager_role_details as $managerRoleDetails): ?>
            <tr>
                <td><?= h($managerRoleDetails->id) ?></td>
                <td><?= h($managerRoleDetails->manager_role_id) ?></td>
                <td><?= h($managerRoleDetails->manager_operator_id) ?></td>
                <td><?= h($managerRoleDetails->created) ?></td>
                <td><?= h($managerRoleDetails->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ManagerRoleDetails', 'action' => 'view', $managerRoleDetails->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ManagerRoleDetails', 'action' => 'edit', $managerRoleDetails->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ManagerRoleDetails', 'action' => 'delete', $managerRoleDetails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $managerRoleDetails->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
