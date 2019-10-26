<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Exam Main Types'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Exam Types'), ['controller' => 'ExamTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Exam Type'), ['controller' => 'ExamTypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="examMainTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($examMainType) ?>
    <fieldset>
        <legend><?= __('Add Exam Main Type') ?></legend>
        <?php
            echo $this->Form->input('label_main_type');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
