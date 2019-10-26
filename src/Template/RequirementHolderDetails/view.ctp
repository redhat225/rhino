<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Requirement Holder Detail'), ['action' => 'edit', $requirementHolderDetail->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Requirement Holder Detail'), ['action' => 'delete', $requirementHolderDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requirementHolderDetail->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Requirement Holder Details'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Requirement Holder Detail'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Requirement Holders'), ['controller' => 'RequirementHolders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Requirement Holder'), ['controller' => 'RequirementHolders', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Requirements'), ['controller' => 'Requirements', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Requirement'), ['controller' => 'Requirements', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="requirementHolderDetails view large-9 medium-8 columns content">
    <h3><?= h($requirementHolderDetail->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Requirement Holder') ?></th>
            <td><?= $requirementHolderDetail->has('requirement_holder') ? $this->Html->link($requirementHolderDetail->requirement_holder->id, ['controller' => 'RequirementHolders', 'action' => 'view', $requirementHolderDetail->requirement_holder->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Requirement') ?></th>
            <td><?= $requirementHolderDetail->has('requirement') ? $this->Html->link($requirementHolderDetail->requirement->id, ['controller' => 'Requirements', 'action' => 'view', $requirementHolderDetail->requirement->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($requirementHolderDetail->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($requirementHolderDetail->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($requirementHolderDetail->modified) ?></td>
        </tr>
    </table>
</div>
