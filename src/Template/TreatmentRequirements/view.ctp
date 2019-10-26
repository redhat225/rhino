<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Treatment Requirement'), ['action' => 'edit', $treatmentRequirement->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Treatment Requirement'), ['action' => 'delete', $treatmentRequirement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $treatmentRequirement->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Treatment Requirements'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Treatment Requirement'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Treatments'), ['controller' => 'Treatments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Treatment'), ['controller' => 'Treatments', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="treatmentRequirements view large-9 medium-8 columns content">
    <h3><?= h($treatmentRequirement->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Label Requirement') ?></th>
            <td><?= h($treatmentRequirement->label_requirement) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Requirement Cis Code') ?></th>
            <td><?= h($treatmentRequirement->requirement_cis_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Treatment') ?></th>
            <td><?= $treatmentRequirement->has('treatment') ? $this->Html->link($treatmentRequirement->treatment->id, ['controller' => 'Treatments', 'action' => 'view', $treatmentRequirement->treatment->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($treatmentRequirement->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Requirement Id') ?></th>
            <td><?= $this->Number->format($treatmentRequirement->requirement_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Requirement Duration') ?></th>
            <td><?= $this->Number->format($treatmentRequirement->requirement_duration) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($treatmentRequirement->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($treatmentRequirement->modified) ?></td>
        </tr>
    </table>
</div>
