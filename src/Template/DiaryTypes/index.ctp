<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Diary Type'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Diaries'), ['controller' => 'Diaries', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Diary'), ['controller' => 'Diaries', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="diaryTypes index large-9 medium-8 columns content">
    <h3><?= __('Diary Types') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('label') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($diaryTypes as $diaryType): ?>
            <tr>
                <td><?= $this->Number->format($diaryType->id) ?></td>
                <td><?= h($diaryType->label) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $diaryType->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $diaryType->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $diaryType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $diaryType->id)]) ?>
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
