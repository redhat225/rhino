<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Requirement Info Generic'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Requirement Info Generic Groups'), ['controller' => 'RequirementInfoGenericGroups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Requirement Info Generic Group'), ['controller' => 'RequirementInfoGenericGroups', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="requirementInfoGenerics index large-9 medium-8 columns content">
    <h3><?= __('Requirement Info Generics') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('generic_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('requirement_info_generic_group_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($requirementInfoGenerics as $requirementInfoGeneric): ?>
            <tr>
                <td><?= $this->Number->format($requirementInfoGeneric->id) ?></td>
                <td><?= h($requirementInfoGeneric->generic_type) ?></td>
                <td><?= $requirementInfoGeneric->has('requirement_info_generic_group') ? $this->Html->link($requirementInfoGeneric->requirement_info_generic_group->id, ['controller' => 'RequirementInfoGenericGroups', 'action' => 'view', $requirementInfoGeneric->requirement_info_generic_group->id]) : '' ?></td>
                <td><?= h($requirementInfoGeneric->created) ?></td>
                <td><?= h($requirementInfoGeneric->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $requirementInfoGeneric->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $requirementInfoGeneric->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $requirementInfoGeneric->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requirementInfoGeneric->id)]) ?>
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
