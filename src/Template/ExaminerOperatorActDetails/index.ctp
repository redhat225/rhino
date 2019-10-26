<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Examiner Operator Act Detail'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Examiner Operator Acts'), ['controller' => 'ExaminerOperatorActs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Examiner Operator Act'), ['controller' => 'ExaminerOperatorActs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Examiner Operators'), ['controller' => 'ExaminerOperators', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Examiner Operator'), ['controller' => 'ExaminerOperators', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="examinerOperatorActDetails index large-9 medium-8 columns content">
    <h3><?= __('Examiner Operator Act Details') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('examiner_operator_act_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('examiner_operator_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($examinerOperatorActDetails as $examinerOperatorActDetail): ?>
            <tr>
                <td><?= $this->Number->format($examinerOperatorActDetail->id) ?></td>
                <td><?= $examinerOperatorActDetail->has('examiner_operator_act') ? $this->Html->link($examinerOperatorActDetail->examiner_operator_act->id, ['controller' => 'ExaminerOperatorActs', 'action' => 'view', $examinerOperatorActDetail->examiner_operator_act->id]) : '' ?></td>
                <td><?= $examinerOperatorActDetail->has('examiner_operator') ? $this->Html->link($examinerOperatorActDetail->examiner_operator->id, ['controller' => 'ExaminerOperators', 'action' => 'view', $examinerOperatorActDetail->examiner_operator->id]) : '' ?></td>
                <td><?= h($examinerOperatorActDetail->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $examinerOperatorActDetail->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $examinerOperatorActDetail->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $examinerOperatorActDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $examinerOperatorActDetail->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
