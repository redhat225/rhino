<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Requirement Info Generic Group'), ['action' => 'edit', $requirementInfoGenericGroup->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Requirement Info Generic Group'), ['action' => 'delete', $requirementInfoGenericGroup->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requirementInfoGenericGroup->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Requirement Info Generic Groups'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Requirement Info Generic Group'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Requirement Info Generics'), ['controller' => 'RequirementInfoGenerics', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Requirement Info Generic'), ['controller' => 'RequirementInfoGenerics', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="requirementInfoGenericGroups view large-9 medium-8 columns content">
    <h3><?= h($requirementInfoGenericGroup->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Group Label') ?></th>
            <td><?= h($requirementInfoGenericGroup->group_label) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Group Code') ?></th>
            <td><?= h($requirementInfoGenericGroup->group_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($requirementInfoGenericGroup->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($requirementInfoGenericGroup->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($requirementInfoGenericGroup->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Requirement Info Generics') ?></h4>
        <?php if (!empty($requirementInfoGenericGroup->requirement_info_generics)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Generic Type') ?></th>
                <th scope="col"><?= __('Requirement Info Generic Group Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($requirementInfoGenericGroup->requirement_info_generics as $requirementInfoGenerics): ?>
            <tr>
                <td><?= h($requirementInfoGenerics->id) ?></td>
                <td><?= h($requirementInfoGenerics->generic_type) ?></td>
                <td><?= h($requirementInfoGenerics->requirement_info_generic_group_id) ?></td>
                <td><?= h($requirementInfoGenerics->created) ?></td>
                <td><?= h($requirementInfoGenerics->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'RequirementInfoGenerics', 'action' => 'view', $requirementInfoGenerics->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'RequirementInfoGenerics', 'action' => 'edit', $requirementInfoGenerics->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'RequirementInfoGenerics', 'action' => 'delete', $requirementInfoGenerics->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requirementInfoGenerics->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
