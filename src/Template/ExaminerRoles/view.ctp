<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Examiner Role'), ['action' => 'edit', $examinerRole->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Examiner Role'), ['action' => 'delete', $examinerRole->id], ['confirm' => __('Are you sure you want to delete # {0}?', $examinerRole->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Examiner Roles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Examiner Role'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Examiner Role Details'), ['controller' => 'ExaminerRoleDetails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Examiner Role Detail'), ['controller' => 'ExaminerRoleDetails', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="examinerRoles view large-9 medium-8 columns content">
    <h3><?= h($examinerRole->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Label Role') ?></th>
            <td><?= h($examinerRole->label_role) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($examinerRole->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Examiner Role Details') ?></h4>
        <?php if (!empty($examinerRole->examiner_role_details)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Examiner Operator Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Examiner Role Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($examinerRole->examiner_role_details as $examinerRoleDetails): ?>
            <tr>
                <td><?= h($examinerRoleDetails->id) ?></td>
                <td><?= h($examinerRoleDetails->examiner_operator_id) ?></td>
                <td><?= h($examinerRoleDetails->created) ?></td>
                <td><?= h($examinerRoleDetails->modified) ?></td>
                <td><?= h($examinerRoleDetails->examiner_role_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ExaminerRoleDetails', 'action' => 'view', $examinerRoleDetails->]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ExaminerRoleDetails', 'action' => 'edit', $examinerRoleDetails->]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ExaminerRoleDetails', 'action' => 'delete', $examinerRoleDetails->], ['confirm' => __('Are you sure you want to delete # {0}?', $examinerRoleDetails->)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
