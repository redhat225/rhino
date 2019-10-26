<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Diary'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Diary Tokens'), ['controller' => 'DiaryTokens', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Diary Token'), ['controller' => 'DiaryTokens', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Diary Types'), ['controller' => 'DiaryTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Diary Type'), ['controller' => 'DiaryTypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="diaries index large-9 medium-8 columns content">
    <h3><?= __('Diaries') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('diary_token_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('diary_type_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('diary_content') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($diaries as $diary): ?>
            <tr>
                <td><?= $this->Number->format($diary->id) ?></td>
                <td><?= $diary->has('diary_token') ? $this->Html->link($diary->diary_token->id, ['controller' => 'DiaryTokens', 'action' => 'view', $diary->diary_token->id]) : '' ?></td>
                <td><?= $diary->has('diary_type') ? $this->Html->link($diary->diary_type->id, ['controller' => 'DiaryTypes', 'action' => 'view', $diary->diary_type->id]) : '' ?></td>
                <td><?= h($diary->created) ?></td>
                <td><?= h($diary->diary_content) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $diary->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $diary->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $diary->id], ['confirm' => __('Are you sure you want to delete # {0}?', $diary->id)]) ?>
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
