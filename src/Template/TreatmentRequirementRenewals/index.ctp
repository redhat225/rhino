<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Treatment Requirement Renewal'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Treatment Requirements'), ['controller' => 'TreatmentRequirements', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Treatment Requirement'), ['controller' => 'TreatmentRequirements', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="treatmentRequirementRenewals index large-9 medium-8 columns content">
    <h3><?= __('Treatment Requirement Renewals') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('treatment_requirement_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('renewal_duration') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($treatmentRequirementRenewals as $treatmentRequirementRenewal): ?>
            <tr>
                <td><?= $this->Number->format($treatmentRequirementRenewal->id) ?></td>
                <td><?= h($treatmentRequirementRenewal->created) ?></td>
                <td><?= h($treatmentRequirementRenewal->modified) ?></td>
                <td><?= $treatmentRequirementRenewal->has('treatment_requirement') ? $this->Html->link($treatmentRequirementRenewal->treatment_requirement->id, ['controller' => 'TreatmentRequirements', 'action' => 'view', $treatmentRequirementRenewal->treatment_requirement->id]) : '' ?></td>
                <td><?= $this->Number->format($treatmentRequirementRenewal->renewal_duration) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $treatmentRequirementRenewal->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $treatmentRequirementRenewal->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $treatmentRequirementRenewal->id], ['confirm' => __('Are you sure you want to delete # {0}?', $treatmentRequirementRenewal->id)]) ?>
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
