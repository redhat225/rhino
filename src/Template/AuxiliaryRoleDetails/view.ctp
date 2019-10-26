<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Auxiliary Role Detail'), ['action' => 'edit', $auxiliaryRoleDetail->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Auxiliary Role Detail'), ['action' => 'delete', $auxiliaryRoleDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $auxiliaryRoleDetail->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Auxiliary Role Details'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Auxiliary Role Detail'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Auxiliaries'), ['controller' => 'Auxiliaries', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Auxiliary'), ['controller' => 'Auxiliaries', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Auxiliary Roles'), ['controller' => 'AuxiliaryRoles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Auxiliary Role'), ['controller' => 'AuxiliaryRoles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="auxiliaryRoleDetails view large-9 medium-8 columns content">
    <h3><?= h($auxiliaryRoleDetail->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Auxiliary') ?></th>
            <td><?= $auxiliaryRoleDetail->has('auxiliary') ? $this->Html->link($auxiliaryRoleDetail->auxiliary->id, ['controller' => 'Auxiliaries', 'action' => 'view', $auxiliaryRoleDetail->auxiliary->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Auxiliary Role') ?></th>
            <td><?= $auxiliaryRoleDetail->has('auxiliary_role') ? $this->Html->link($auxiliaryRoleDetail->auxiliary_role->id, ['controller' => 'AuxiliaryRoles', 'action' => 'view', $auxiliaryRoleDetail->auxiliary_role->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($auxiliaryRoleDetail->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($auxiliaryRoleDetail->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($auxiliaryRoleDetail->modified) ?></td>
        </tr>
    </table>
</div>
