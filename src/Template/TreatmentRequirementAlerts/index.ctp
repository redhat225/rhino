<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Treatment Requirement Alert'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Treatment Requirements'), ['controller' => 'TreatmentRequirements', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Treatment Requirement'), ['controller' => 'TreatmentRequirements', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="treatmentRequirementAlerts index large-9 medium-8 columns content">
    <h3><?= __('Treatment Requirement Alerts') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('treatment_requirement_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('alert_level') ?></th>
                <th scope="col"><?= $this->Paginator->sort('alert_label') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('alert_description') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($treatmentRequirementAlerts as $treatmentRequirementAlert): ?>
            <tr>
                <td><?= $this->Number->format($treatmentRequirementAlert->id) ?></td>
                <td><?= $treatmentRequirementAlert->has('treatment_requirement') ? $this->Html->link($treatmentRequirementAlert->treatment_requirement->id, ['controller' => 'TreatmentRequirements', 'action' => 'view', $treatmentRequirementAlert->treatment_requirement->id]) : '' ?></td>
                <td><?= $this->Number->format($treatmentRequirementAlert->alert_level) ?></td>
                <td><?= h($treatmentRequirementAlert->alert_label) ?></td>
                <td><?= h($treatmentRequirementAlert->created) ?></td>
                <td><?= h($treatmentRequirementAlert->modified) ?></td>
                <td><?= h($treatmentRequirementAlert->alert_description) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $treatmentRequirementAlert->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $treatmentRequirementAlert->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $treatmentRequirementAlert->id], ['confirm' => __('Are you sure you want to delete # {0}?', $treatmentRequirementAlert->id)]) ?>
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
