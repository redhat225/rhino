<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Treatment Requirement Specification'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Treatment Requirements'), ['controller' => 'TreatmentRequirements', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Treatment Requirement'), ['controller' => 'TreatmentRequirements', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="treatmentRequirementSpecifications index large-9 medium-8 columns content">
    <h3><?= __('Treatment Requirement Specifications') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('treatment_requirement_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('specification_route') ?></th>
                <th scope="col"><?= $this->Paginator->sort('specification_dosage') ?></th>
                <th scope="col"><?= $this->Paginator->sort('specification_frequency') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($treatmentRequirementSpecifications as $treatmentRequirementSpecification): ?>
            <tr>
                <td><?= $this->Number->format($treatmentRequirementSpecification->id) ?></td>
                <td><?= $treatmentRequirementSpecification->has('treatment_requirement') ? $this->Html->link($treatmentRequirementSpecification->treatment_requirement->id, ['controller' => 'TreatmentRequirements', 'action' => 'view', $treatmentRequirementSpecification->treatment_requirement->id]) : '' ?></td>
                <td><?= h($treatmentRequirementSpecification->created) ?></td>
                <td><?= h($treatmentRequirementSpecification->modified) ?></td>
                <td><?= h($treatmentRequirementSpecification->specification_route) ?></td>
                <td><?= h($treatmentRequirementSpecification->specification_dosage) ?></td>
                <td><?= h($treatmentRequirementSpecification->specification_frequency) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $treatmentRequirementSpecification->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $treatmentRequirementSpecification->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $treatmentRequirementSpecification->id], ['confirm' => __('Are you sure you want to delete # {0}?', $treatmentRequirementSpecification->id)]) ?>
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
