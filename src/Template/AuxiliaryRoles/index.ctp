<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Auxiliary Role'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Auxiliary Role Details'), ['controller' => 'AuxiliaryRoleDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Auxiliary Role Detail'), ['controller' => 'AuxiliaryRoleDetails', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="auxiliaryRoles index large-9 medium-8 columns content">
    <h3><?= __('Auxiliary Roles') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('label_role') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($auxiliaryRoles as $auxiliaryRole): ?>
            <tr>
                <td><?= $this->Number->format($auxiliaryRole->id) ?></td>
                <td><?= h($auxiliaryRole->label_role) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $auxiliaryRole->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $auxiliaryRole->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $auxiliaryRole->id], ['confirm' => __('Are you sure you want to delete # {0}?', $auxiliaryRole->id)]) ?>
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
