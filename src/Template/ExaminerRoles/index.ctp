<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Examiner Role'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Examiner Role Details'), ['controller' => 'ExaminerRoleDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Examiner Role Detail'), ['controller' => 'ExaminerRoleDetails', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="examinerRoles index large-9 medium-8 columns content">
    <h3><?= __('Examiner Roles') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('label_role') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($examinerRoles as $examinerRole): ?>
            <tr>
                <td><?= $this->Number->format($examinerRole->id) ?></td>
                <td><?= h($examinerRole->label_role) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $examinerRole->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $examinerRole->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $examinerRole->id], ['confirm' => __('Are you sure you want to delete # {0}?', $examinerRole->id)]) ?>
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
