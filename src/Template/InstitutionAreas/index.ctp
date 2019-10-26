<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Institution Area'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="institutionAreas index large-9 medium-8 columns content">
    <h3><?= __('Institution Areas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('area') ?></th>
                <th scope="col"><?= $this->Paginator->sort('city') ?></th>
                <th scope="col"><?= $this->Paginator->sort('zone') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($institutionAreas as $institutionArea): ?>
            <tr>
                <td><?= $this->Number->format($institutionArea->id) ?></td>
                <td><?= h($institutionArea->area) ?></td>
                <td><?= h($institutionArea->city) ?></td>
                <td><?= h($institutionArea->zone) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $institutionArea->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $institutionArea->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $institutionArea->id], ['confirm' => __('Are you sure you want to delete # {0}?', $institutionArea->id)]) ?>
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
