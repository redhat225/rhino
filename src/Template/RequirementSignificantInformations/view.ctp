<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Requirement Significant Information'), ['action' => 'edit', $requirementSignificantInformation->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Requirement Significant Information'), ['action' => 'delete', $requirementSignificantInformation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requirementSignificantInformation->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Requirement Significant Informations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Requirement Significant Information'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Requirements'), ['controller' => 'Requirements', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Requirement'), ['controller' => 'Requirements', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="requirementSignificantInformations view large-9 medium-8 columns content">
    <h3><?= h($requirementSignificantInformation->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Information Label') ?></th>
            <td><?= h($requirementSignificantInformation->information_label) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Information Url') ?></th>
            <td><?= h($requirementSignificantInformation->information_url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Requirement') ?></th>
            <td><?= $requirementSignificantInformation->has('requirement') ? $this->Html->link($requirementSignificantInformation->requirement->id, ['controller' => 'Requirements', 'action' => 'view', $requirementSignificantInformation->requirement->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($requirementSignificantInformation->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Begin') ?></th>
            <td><?= h($requirementSignificantInformation->begin) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('End') ?></th>
            <td><?= h($requirementSignificantInformation->end) ?></td>
        </tr>
    </table>
</div>
