<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List People Contacts'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List People'), ['controller' => 'People', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Person'), ['controller' => 'People', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="peopleContacts form large-9 medium-8 columns content">
    <?= $this->Form->create($peopleContact) ?>
    <fieldset>
        <legend><?= __('Add People Contact') ?></legend>
        <?php
            echo $this->Form->input('contact1');
            echo $this->Form->input('contact2');
            echo $this->Form->input('people_id', ['options' => $people]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
