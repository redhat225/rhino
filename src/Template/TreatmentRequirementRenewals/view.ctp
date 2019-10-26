<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Treatment Requirement Renewal'), ['action' => 'edit', $treatmentRequirementRenewal->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Treatment Requirement Renewal'), ['action' => 'delete', $treatmentRequirementRenewal->id], ['confirm' => __('Are you sure you want to delete # {0}?', $treatmentRequirementRenewal->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Treatment Requirement Renewals'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Treatment Requirement Renewal'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Treatment Requirements'), ['controller' => 'TreatmentRequirements', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Treatment Requirement'), ['controller' => 'TreatmentRequirements', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="treatmentRequirementRenewals view large-9 medium-8 columns content">
    <h3><?= h($treatmentRequirementRenewal->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Treatment Requirement') ?></th>
            <td><?= $treatmentRequirementRenewal->has('treatment_requirement') ? $this->Html->link($treatmentRequirementRenewal->treatment_requirement->id, ['controller' => 'TreatmentRequirements', 'action' => 'view', $treatmentRequirementRenewal->treatment_requirement->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($treatmentRequirementRenewal->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Renewal Duration') ?></th>
            <td><?= $this->Number->format($treatmentRequirementRenewal->renewal_duration) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($treatmentRequirementRenewal->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($treatmentRequirementRenewal->modified) ?></td>
        </tr>
    </table>
</div>
