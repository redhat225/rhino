<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Examiner Operator Act Detail'), ['action' => 'edit', $examinerOperatorActDetail->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Examiner Operator Act Detail'), ['action' => 'delete', $examinerOperatorActDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $examinerOperatorActDetail->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Examiner Operator Act Details'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Examiner Operator Act Detail'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Examiner Operator Acts'), ['controller' => 'ExaminerOperatorActs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Examiner Operator Act'), ['controller' => 'ExaminerOperatorActs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Examiner Operators'), ['controller' => 'ExaminerOperators', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Examiner Operator'), ['controller' => 'ExaminerOperators', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="examinerOperatorActDetails view large-9 medium-8 columns content">
    <h3><?= h($examinerOperatorActDetail->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Examiner Operator Act') ?></th>
            <td><?= $examinerOperatorActDetail->has('examiner_operator_act') ? $this->Html->link($examinerOperatorActDetail->examiner_operator_act->id, ['controller' => 'ExaminerOperatorActs', 'action' => 'view', $examinerOperatorActDetail->examiner_operator_act->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Examiner Operator') ?></th>
            <td><?= $examinerOperatorActDetail->has('examiner_operator') ? $this->Html->link($examinerOperatorActDetail->examiner_operator->id, ['controller' => 'ExaminerOperators', 'action' => 'view', $examinerOperatorActDetail->examiner_operator->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($examinerOperatorActDetail->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($examinerOperatorActDetail->created) ?></td>
        </tr>
    </table>
</div>
