<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $diary->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $diary->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Diaries'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Diary Tokens'), ['controller' => 'DiaryTokens', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Diary Token'), ['controller' => 'DiaryTokens', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Diary Types'), ['controller' => 'DiaryTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Diary Type'), ['controller' => 'DiaryTypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="diaries form large-9 medium-8 columns content">
    <?= $this->Form->create($diary) ?>
    <fieldset>
        <legend><?= __('Edit Diary') ?></legend>
        <?php
            echo $this->Form->input('diary_token_id', ['options' => $diaryTokens]);
            echo $this->Form->input('diary_type_id', ['options' => $diaryTypes]);
            echo $this->Form->input('diary_content');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
