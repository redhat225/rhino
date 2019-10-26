<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Examiner Operator Act'), ['action' => 'edit', $examinerOperatorAct->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Examiner Operator Act'), ['action' => 'delete', $examinerOperatorAct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $examinerOperatorAct->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Examiner Operator Acts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Examiner Operator Act'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Examiner Operator Act Details'), ['controller' => 'ExaminerOperatorActDetails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Examiner Operator Act Detail'), ['controller' => 'ExaminerOperatorActDetails', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="examinerOperatorActs view large-9 medium-8 columns content">
    <h3><?= h($examinerOperatorAct->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Label Examiner Op Act') ?></th>
            <td><?= h($examinerOperatorAct->label_examiner_op_act) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($examinerOperatorAct->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Examiner Operator Act Details') ?></h4>
        <?php if (!empty($examinerOperatorAct->examiner_operator_act_details)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Examiner Operator Act Id') ?></th>
                <th scope="col"><?= __('Examiner Operator Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($examinerOperatorAct->examiner_operator_act_details as $examinerOperatorActDetails): ?>
            <tr>
                <td><?= h($examinerOperatorActDetails->id) ?></td>
                <td><?= h($examinerOperatorActDetails->examiner_operator_act_id) ?></td>
                <td><?= h($examinerOperatorActDetails->examiner_operator_id) ?></td>
                <td><?= h($examinerOperatorActDetails->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ExaminerOperatorActDetails', 'action' => 'view', $examinerOperatorActDetails->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ExaminerOperatorActDetails', 'action' => 'edit', $examinerOperatorActDetails->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ExaminerOperatorActDetails', 'action' => 'delete', $examinerOperatorActDetails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $examinerOperatorActDetails->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
