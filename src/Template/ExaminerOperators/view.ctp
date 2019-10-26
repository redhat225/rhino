<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Examiner Operator'), ['action' => 'edit', $examinerOperator->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Examiner Operator'), ['action' => 'delete', $examinerOperator->id], ['confirm' => __('Are you sure you want to delete # {0}?', $examinerOperator->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Examiner Operators'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Examiner Operator'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List People'), ['controller' => 'People', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Person'), ['controller' => 'People', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Examiner Operator Act Details'), ['controller' => 'ExaminerOperatorActDetails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Examiner Operator Act Detail'), ['controller' => 'ExaminerOperatorActDetails', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="examinerOperators view large-9 medium-8 columns content">
    <h3><?= h($examinerOperator->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Code') ?></th>
            <td><?= h($examinerOperator->code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($examinerOperator->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($examinerOperator->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Person') ?></th>
            <td><?= $examinerOperator->has('person') ? $this->Html->link($examinerOperator->person->id, ['controller' => 'People', 'action' => 'view', $examinerOperator->person->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Avatar Examiner') ?></th>
            <td><?= h($examinerOperator->avatar_examiner) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($examinerOperator->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Examiner Institution Id') ?></th>
            <td><?= $this->Number->format($examinerOperator->examiner_institution_id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Password') ?></h4>
        <?= $this->Text->autoParagraph(h($examinerOperator->password)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Examiner Operator Act Details') ?></h4>
        <?php if (!empty($examinerOperator->examiner_operator_act_details)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Examiner Operator Act Id') ?></th>
                <th scope="col"><?= __('Examiner Operator Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($examinerOperator->examiner_operator_act_details as $examinerOperatorActDetails): ?>
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
