<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Visit Levels'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Visits'), ['controller' => 'Visits', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit'), ['controller' => 'Visits', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="visitLevels form large-9 medium-8 columns content">
    <?= $this->Form->create($visitLevel) ?>
    <fieldset>
        <legend><?= __('Add Visit Level') ?></legend>
        <?php
            echo $this->Form->input('label');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
