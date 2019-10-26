<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Treatment Requirement'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Treatments'), ['controller' => 'Treatments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Treatment'), ['controller' => 'Treatments', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="treatmentRequirements index large-9 medium-8 columns content">
    <h3><?= __('Treatment Requirements') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('label_requirement') ?></th>
                <th scope="col"><?= $this->Paginator->sort('requirement_cis_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('requirement_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('treatment_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('requirement_duration') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($treatmentRequirements as $treatmentRequirement): ?>
            <tr>
                <td><?= $this->Number->format($treatmentRequirement->id) ?></td>
                <td><?= h($treatmentRequirement->label_requirement) ?></td>
                <td><?= h($treatmentRequirement->requirement_cis_code) ?></td>
                <td><?= $this->Number->format($treatmentRequirement->requirement_id) ?></td>
                <td><?= h($treatmentRequirement->created) ?></td>
                <td><?= h($treatmentRequirement->modified) ?></td>
                <td><?= $treatmentRequirement->has('treatment') ? $this->Html->link($treatmentRequirement->treatment->id, ['controller' => 'Treatments', 'action' => 'view', $treatmentRequirement->treatment->id]) : '' ?></td>
                <td><?= $this->Number->format($treatmentRequirement->requirement_duration) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $treatmentRequirement->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $treatmentRequirement->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $treatmentRequirement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $treatmentRequirement->id)]) ?>
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
