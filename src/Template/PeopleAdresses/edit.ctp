<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $peopleAdress->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $peopleAdress->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List People Adresses'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List People'), ['controller' => 'People', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Person'), ['controller' => 'People', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="peopleAdresses form large-9 medium-8 columns content">
    <?= $this->Form->create($peopleAdress) ?>
    <fieldset>
        <legend><?= __('Edit People Adress') ?></legend>
        <?php
            echo $this->Form->input('people_id', ['options' => $people]);
            echo $this->Form->input('city_quarter');
            echo $this->Form->input('city');
            echo $this->Form->input('country');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
