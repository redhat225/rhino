<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Exam Under Types'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Exam Types'), ['controller' => 'ExamTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Exam Type'), ['controller' => 'ExamTypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="examUnderTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($examUnderType) ?>
    <fieldset>
        <legend><?= __('Add Exam Under Type') ?></legend>
        <?php
            echo $this->Form->input('exam_type_id', ['options' => $examTypes]);
            echo $this->Form->input('label_exam_under_type');
            echo $this->Form->input('template_exam');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
