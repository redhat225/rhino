<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Auxiliary Role Detail'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Auxiliaries'), ['controller' => 'Auxiliaries', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Auxiliary'), ['controller' => 'Auxiliaries', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Auxiliary Roles'), ['controller' => 'AuxiliaryRoles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Auxiliary Role'), ['controller' => 'AuxiliaryRoles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="auxiliaryRoleDetails index large-9 medium-8 columns content">
    <h3><?= __('Auxiliary Role Details') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('auxiliary_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('auxiliary_role_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($auxiliaryRoleDetails as $auxiliaryRoleDetail): ?>
            <tr>
                <td><?= $this->Number->format($auxiliaryRoleDetail->id) ?></td>
                <td><?= $auxiliaryRoleDetail->has('auxiliary') ? $this->Html->link($auxiliaryRoleDetail->auxiliary->id, ['controller' => 'Auxiliaries', 'action' => 'view', $auxiliaryRoleDetail->auxiliary->id]) : '' ?></td>
                <td><?= $auxiliaryRoleDetail->has('auxiliary_role') ? $this->Html->link($auxiliaryRoleDetail->auxiliary_role->id, ['controller' => 'AuxiliaryRoles', 'action' => 'view', $auxiliaryRoleDetail->auxiliary_role->id]) : '' ?></td>
                <td><?= h($auxiliaryRoleDetail->created) ?></td>
                <td><?= h($auxiliaryRoleDetail->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $auxiliaryRoleDetail->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $auxiliaryRoleDetail->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $auxiliaryRoleDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $auxiliaryRoleDetail->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
