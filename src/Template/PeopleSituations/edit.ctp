<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $peopleSituation->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $peopleSituation->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List People Situations'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List People'), ['controller' => 'People', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Person'), ['controller' => 'People', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="peopleSituations form large-9 medium-8 columns content">
    <?= $this->Form->create($peopleSituation) ?>
    <fieldset>
        <legend><?= __('Edit People Situation') ?></legend>
        <?php
            echo $this->Form->input('people_id', ['options' => $people]);
            echo $this->Form->input('status');
            echo $this->Form->input('children');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
