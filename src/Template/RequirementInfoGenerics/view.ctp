<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Requirement Info Generic'), ['action' => 'edit', $requirementInfoGeneric->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Requirement Info Generic'), ['action' => 'delete', $requirementInfoGeneric->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requirementInfoGeneric->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Requirement Info Generics'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Requirement Info Generic'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Requirement Info Generic Groups'), ['controller' => 'RequirementInfoGenericGroups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Requirement Info Generic Group'), ['controller' => 'RequirementInfoGenericGroups', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="requirementInfoGenerics view large-9 medium-8 columns content">
    <h3><?= h($requirementInfoGeneric->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Generic Type') ?></th>
            <td><?= h($requirementInfoGeneric->generic_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Requirement Info Generic Group') ?></th>
            <td><?= $requirementInfoGeneric->has('requirement_info_generic_group') ? $this->Html->link($requirementInfoGeneric->requirement_info_generic_group->id, ['controller' => 'RequirementInfoGenericGroups', 'action' => 'view', $requirementInfoGeneric->requirement_info_generic_group->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($requirementInfoGeneric->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($requirementInfoGeneric->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($requirementInfoGeneric->modified) ?></td>
        </tr>
    </table>
</div>
