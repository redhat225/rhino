<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Examiner Operator Act Details'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Examiner Operator Acts'), ['controller' => 'ExaminerOperatorActs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Examiner Operator Act'), ['controller' => 'ExaminerOperatorActs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Examiner Operators'), ['controller' => 'ExaminerOperators', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Examiner Operator'), ['controller' => 'ExaminerOperators', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="examinerOperatorActDetails form large-9 medium-8 columns content">
    <?= $this->Form->create($examinerOperatorActDetail) ?>
    <fieldset>
        <legend><?= __('Add Examiner Operator Act Detail') ?></legend>
        <?php
            echo $this->Form->input('examiner_operator_act_id', ['options' => $examinerOperatorActs]);
            echo $this->Form->input('examiner_operator_id', ['options' => $examinerOperators]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
