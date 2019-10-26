<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Manager Role'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Manager Role Details'), ['controller' => 'ManagerRoleDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Manager Role Detail'), ['controller' => 'ManagerRoleDetails', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="managerRoles index large-9 medium-8 columns content">
    <h3><?= __('Manager Roles') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('label_role') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($managerRoles as $managerRole): ?>
            <tr>
                <td><?= $this->Number->format($managerRole->id) ?></td>
                <td><?= h($managerRole->label_role) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $managerRole->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $managerRole->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $managerRole->id], ['confirm' => __('Are you sure you want to delete # {0}?', $managerRole->id)]) ?>
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
