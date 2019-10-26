<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $examinerOperator->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $examinerOperator->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Examiner Operators'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List People'), ['controller' => 'People', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Person'), ['controller' => 'People', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Examiner Operator Act Details'), ['controller' => 'ExaminerOperatorActDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Examiner Operator Act Detail'), ['controller' => 'ExaminerOperatorActDetails', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="examinerOperators form large-9 medium-8 columns content">
    <?= $this->Form->create($examinerOperator) ?>
    <fieldset>
        <legend><?= __('Edit Examiner Operator') ?></legend>
        <?php
            echo $this->Form->input('code');
            echo $this->Form->input('username');
            echo $this->Form->input('password');
            echo $this->Form->input('email');
            echo $this->Form->input('people_id', ['options' => $people]);
            echo $this->Form->input('examiner_institution_id');
            echo $this->Form->input('avatar_examiner');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
