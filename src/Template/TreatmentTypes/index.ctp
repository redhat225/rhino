<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Treatment Type'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Treatments'), ['controller' => 'Treatments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Treatment'), ['controller' => 'Treatments', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="treatmentTypes index large-9 medium-8 columns content">
    <h3><?= __('Treatment Types') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('label') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($treatmentTypes as $treatmentType): ?>
            <tr>
                <td><?= $this->Number->format($treatmentType->id) ?></td>
                <td><?= h($treatmentType->label) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $treatmentType->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $treatmentType->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $treatmentType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $treatmentType->id)]) ?>
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
