<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $examinerOperatorAct->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $examinerOperatorAct->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Examiner Operator Acts'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Examiner Operator Act Details'), ['controller' => 'ExaminerOperatorActDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Examiner Operator Act Detail'), ['controller' => 'ExaminerOperatorActDetails', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="examinerOperatorActs form large-9 medium-8 columns content">
    <?= $this->Form->create($examinerOperatorAct) ?>
    <fieldset>
        <legend><?= __('Edit Examiner Operator Act') ?></legend>
        <?php
            echo $this->Form->input('label_examiner_op_act');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
