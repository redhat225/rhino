<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Diary Type'), ['action' => 'edit', $diaryType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Diary Type'), ['action' => 'delete', $diaryType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $diaryType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Diary Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Diary Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Diaries'), ['controller' => 'Diaries', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Diary'), ['controller' => 'Diaries', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="diaryTypes view large-9 medium-8 columns content">
    <h3><?= h($diaryType->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Label') ?></th>
            <td><?= h($diaryType->label) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($diaryType->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Diaries') ?></h4>
        <?php if (!empty($diaryType->diaries)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Diary Token Id') ?></th>
                <th scope="col"><?= __('Diary Type Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Diary Content') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($diaryType->diaries as $diaries): ?>
            <tr>
                <td><?= h($diaries->id) ?></td>
                <td><?= h($diaries->diary_token_id) ?></td>
                <td><?= h($diaries->diary_type_id) ?></td>
                <td><?= h($diaries->created) ?></td>
                <td><?= h($diaries->diary_content) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Diaries', 'action' => 'view', $diaries->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Diaries', 'action' => 'edit', $diaries->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Diaries', 'action' => 'delete', $diaries->id], ['confirm' => __('Are you sure you want to delete # {0}?', $diaries->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
