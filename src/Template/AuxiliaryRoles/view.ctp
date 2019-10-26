<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Auxiliary Role'), ['action' => 'edit', $auxiliaryRole->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Auxiliary Role'), ['action' => 'delete', $auxiliaryRole->id], ['confirm' => __('Are you sure you want to delete # {0}?', $auxiliaryRole->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Auxiliary Roles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Auxiliary Role'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Auxiliary Role Details'), ['controller' => 'AuxiliaryRoleDetails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Auxiliary Role Detail'), ['controller' => 'AuxiliaryRoleDetails', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="auxiliaryRoles view large-9 medium-8 columns content">
    <h3><?= h($auxiliaryRole->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Label Role') ?></th>
            <td><?= h($auxiliaryRole->label_role) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($auxiliaryRole->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Auxiliary Role Details') ?></h4>
        <?php if (!empty($auxiliaryRole->auxiliary_role_details)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Auxiliary Id') ?></th>
                <th scope="col"><?= __('Auxiliary Role Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($auxiliaryRole->auxiliary_role_details as $auxiliaryRoleDetails): ?>
            <tr>
                <td><?= h($auxiliaryRoleDetails->id) ?></td>
                <td><?= h($auxiliaryRoleDetails->auxiliary_id) ?></td>
                <td><?= h($auxiliaryRoleDetails->auxiliary_role_id) ?></td>
                <td><?= h($auxiliaryRoleDetails->created) ?></td>
                <td><?= h($auxiliaryRoleDetails->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'AuxiliaryRoleDetails', 'action' => 'view', $auxiliaryRoleDetails->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'AuxiliaryRoleDetails', 'action' => 'edit', $auxiliaryRoleDetails->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'AuxiliaryRoleDetails', 'action' => 'delete', $auxiliaryRoleDetails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $auxiliaryRoleDetails->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
