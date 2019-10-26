<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Treatment Requirement Specification'), ['action' => 'edit', $treatmentRequirementSpecification->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Treatment Requirement Specification'), ['action' => 'delete', $treatmentRequirementSpecification->id], ['confirm' => __('Are you sure you want to delete # {0}?', $treatmentRequirementSpecification->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Treatment Requirement Specifications'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Treatment Requirement Specification'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Treatment Requirements'), ['controller' => 'TreatmentRequirements', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Treatment Requirement'), ['controller' => 'TreatmentRequirements', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="treatmentRequirementSpecifications view large-9 medium-8 columns content">
    <h3><?= h($treatmentRequirementSpecification->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Treatment Requirement') ?></th>
            <td><?= $treatmentRequirementSpecification->has('treatment_requirement') ? $this->Html->link($treatmentRequirementSpecification->treatment_requirement->id, ['controller' => 'TreatmentRequirements', 'action' => 'view', $treatmentRequirementSpecification->treatment_requirement->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Specification Route') ?></th>
            <td><?= h($treatmentRequirementSpecification->specification_route) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Specification Dosage') ?></th>
            <td><?= h($treatmentRequirementSpecification->specification_dosage) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Specification Frequency') ?></th>
            <td><?= h($treatmentRequirementSpecification->specification_frequency) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($treatmentRequirementSpecification->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($treatmentRequirementSpecification->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($treatmentRequirementSpecification->modified) ?></td>
        </tr>
    </table>
</div>
