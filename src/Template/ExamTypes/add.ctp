<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Exam Types'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Exam Under Types'), ['controller' => 'ExamUnderTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Exam Under Type'), ['controller' => 'ExamUnderTypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="examTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($examType) ?>
    <fieldset>
        <legend><?= __('Add Exam Type') ?></legend>
        <?php
            echo $this->Form->input('exam_main_type_id');
            echo $this->Form->input('label_exam_type');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
