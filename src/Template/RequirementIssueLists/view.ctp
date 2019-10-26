<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Requirement Issue List'), ['action' => 'edit', $requirementIssueList->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Requirement Issue List'), ['action' => 'delete', $requirementIssueList->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requirementIssueList->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Requirement Issue Lists'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Requirement Issue List'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Requirements'), ['controller' => 'Requirements', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Requirement'), ['controller' => 'Requirements', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="requirementIssueLists view large-9 medium-8 columns content">
    <h3><?= h($requirementIssueList->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('List Decsription') ?></th>
            <td><?= h($requirementIssueList->list_decsription) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Requirement') ?></th>
            <td><?= $requirementIssueList->has('requirement') ? $this->Html->link($requirementIssueList->requirement->id, ['controller' => 'Requirements', 'action' => 'view', $requirementIssueList->requirement->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($requirementIssueList->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($requirementIssueList->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($requirementIssueList->modified) ?></td>
        </tr>
    </table>
</div>
