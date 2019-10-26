<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $peopleDescendant->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $peopleDescendant->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List People Descendants'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List People'), ['controller' => 'People', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Person'), ['controller' => 'People', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="peopleDescendants form large-9 medium-8 columns content">
    <?= $this->Form->create($peopleDescendant) ?>
    <fieldset>
        <legend><?= __('Edit People Descendant') ?></legend>
        <?php
            echo $this->Form->input('people_id', ['options' => $people]);
            echo $this->Form->input('firstname');
            echo $this->Form->input('lastname');
            echo $this->Form->input('sexe');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
