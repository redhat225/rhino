<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $diaryType->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $diaryType->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Diary Types'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Diaries'), ['controller' => 'Diaries', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Diary'), ['controller' => 'Diaries', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="diaryTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($diaryType) ?>
    <fieldset>
        <legend><?= __('Edit Diary Type') ?></legend>
        <?php
            echo $this->Form->input('label');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
