<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Requirement Info Generic Group'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Requirement Info Generics'), ['controller' => 'RequirementInfoGenerics', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Requirement Info Generic'), ['controller' => 'RequirementInfoGenerics', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="requirementInfoGenericGroups index large-9 medium-8 columns content">
    <h3><?= __('Requirement Info Generic Groups') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('group_label') ?></th>
                <th scope="col"><?= $this->Paginator->sort('group_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($requirementInfoGenericGroups as $requirementInfoGenericGroup): ?>
            <tr>
                <td><?= $this->Number->format($requirementInfoGenericGroup->id) ?></td>
                <td><?= h($requirementInfoGenericGroup->group_label) ?></td>
                <td><?= h($requirementInfoGenericGroup->group_code) ?></td>
                <td><?= h($requirementInfoGenericGroup->created) ?></td>
                <td><?= h($requirementInfoGenericGroup->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $requirementInfoGenericGroup->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $requirementInfoGenericGroup->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $requirementInfoGenericGroup->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requirementInfoGenericGroup->id)]) ?>
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
