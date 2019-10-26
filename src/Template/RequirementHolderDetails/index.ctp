<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Requirement Holder Detail'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Requirement Holders'), ['controller' => 'RequirementHolders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Requirement Holder'), ['controller' => 'RequirementHolders', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Requirements'), ['controller' => 'Requirements', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Requirement'), ['controller' => 'Requirements', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="requirementHolderDetails index large-9 medium-8 columns content">
    <h3><?= __('Requirement Holder Details') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('requirement_holder_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('requirement_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($requirementHolderDetails as $requirementHolderDetail): ?>
            <tr>
                <td><?= $this->Number->format($requirementHolderDetail->id) ?></td>
                <td><?= $requirementHolderDetail->has('requirement_holder') ? $this->Html->link($requirementHolderDetail->requirement_holder->id, ['controller' => 'RequirementHolders', 'action' => 'view', $requirementHolderDetail->requirement_holder->id]) : '' ?></td>
                <td><?= $requirementHolderDetail->has('requirement') ? $this->Html->link($requirementHolderDetail->requirement->id, ['controller' => 'Requirements', 'action' => 'view', $requirementHolderDetail->requirement->id]) : '' ?></td>
                <td><?= h($requirementHolderDetail->created) ?></td>
                <td><?= h($requirementHolderDetail->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $requirementHolderDetail->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $requirementHolderDetail->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $requirementHolderDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requirementHolderDetail->id)]) ?>
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
