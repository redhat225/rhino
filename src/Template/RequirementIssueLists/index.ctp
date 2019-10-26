<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Requirement Issue List'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Requirements'), ['controller' => 'Requirements', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Requirement'), ['controller' => 'Requirements', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="requirementIssueLists index large-9 medium-8 columns content">
    <h3><?= __('Requirement Issue Lists') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('list_decsription') ?></th>
                <th scope="col"><?= $this->Paginator->sort('requirement_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($requirementIssueLists as $requirementIssueList): ?>
            <tr>
                <td><?= $this->Number->format($requirementIssueList->id) ?></td>
                <td><?= h($requirementIssueList->list_decsription) ?></td>
                <td><?= $requirementIssueList->has('requirement') ? $this->Html->link($requirementIssueList->requirement->id, ['controller' => 'Requirements', 'action' => 'view', $requirementIssueList->requirement->id]) : '' ?></td>
                <td><?= h($requirementIssueList->created) ?></td>
                <td><?= h($requirementIssueList->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $requirementIssueList->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $requirementIssueList->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $requirementIssueList->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requirementIssueList->id)]) ?>
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
