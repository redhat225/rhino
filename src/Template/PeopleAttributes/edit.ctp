<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $peopleAttribute->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $peopleAttribute->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List People Attributes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List People'), ['controller' => 'People', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Person'), ['controller' => 'People', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="peopleAttributes form large-9 medium-8 columns content">
    <?= $this->Form->create($peopleAttribute) ?>
    <fieldset>
        <legend><?= __('Edit People Attribute') ?></legend>
        <?php
            echo $this->Form->input('people_id', ['options' => $people]);
            echo $this->Form->input('height');
            echo $this->Form->input('skin');
            echo $this->Form->input('eyes');
            echo $this->Form->input('haircolour');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
