<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Treatment Requirement Alert'), ['action' => 'edit', $treatmentRequirementAlert->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Treatment Requirement Alert'), ['action' => 'delete', $treatmentRequirementAlert->id], ['confirm' => __('Are you sure you want to delete # {0}?', $treatmentRequirementAlert->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Treatment Requirement Alerts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Treatment Requirement Alert'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Treatment Requirements'), ['controller' => 'TreatmentRequirements', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Treatment Requirement'), ['controller' => 'TreatmentRequirements', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="treatmentRequirementAlerts view large-9 medium-8 columns content">
    <h3><?= h($treatmentRequirementAlert->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Treatment Requirement') ?></th>
            <td><?= $treatmentRequirementAlert->has('treatment_requirement') ? $this->Html->link($treatmentRequirementAlert->treatment_requirement->id, ['controller' => 'TreatmentRequirements', 'action' => 'view', $treatmentRequirementAlert->treatment_requirement->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Alert Label') ?></th>
            <td><?= h($treatmentRequirementAlert->alert_label) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Alert Description') ?></th>
            <td><?= h($treatmentRequirementAlert->alert_description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($treatmentRequirementAlert->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Alert Level') ?></th>
            <td><?= $this->Number->format($treatmentRequirementAlert->alert_level) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($treatmentRequirementAlert->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($treatmentRequirementAlert->modified) ?></td>
        </tr>
    </table>
</div>
