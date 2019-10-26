<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Diary'), ['action' => 'edit', $diary->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Diary'), ['action' => 'delete', $diary->id], ['confirm' => __('Are you sure you want to delete # {0}?', $diary->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Diaries'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Diary'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Diary Tokens'), ['controller' => 'DiaryTokens', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Diary Token'), ['controller' => 'DiaryTokens', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Diary Types'), ['controller' => 'DiaryTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Diary Type'), ['controller' => 'DiaryTypes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="diaries view large-9 medium-8 columns content">
    <h3><?= h($diary->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Diary Token') ?></th>
            <td><?= $diary->has('diary_token') ? $this->Html->link($diary->diary_token->id, ['controller' => 'DiaryTokens', 'action' => 'view', $diary->diary_token->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Diary Type') ?></th>
            <td><?= $diary->has('diary_type') ? $this->Html->link($diary->diary_type->id, ['controller' => 'DiaryTypes', 'action' => 'view', $diary->diary_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Diary Content') ?></th>
            <td><?= h($diary->diary_content) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($diary->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($diary->created) ?></td>
        </tr>
    </table>
</div>
