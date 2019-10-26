<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Examiner Operator'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List People'), ['controller' => 'People', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Person'), ['controller' => 'People', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Examiner Operator Act Details'), ['controller' => 'ExaminerOperatorActDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Examiner Operator Act Detail'), ['controller' => 'ExaminerOperatorActDetails', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="examinerOperators index large-9 medium-8 columns content">
    <h3><?= __('Examiner Operators') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('username') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('people_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('examiner_institution_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('avatar_examiner') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($examinerOperators as $examinerOperator): ?>
            <tr>
                <td><?= $this->Number->format($examinerOperator->id) ?></td>
                <td><?= h($examinerOperator->code) ?></td>
                <td><?= h($examinerOperator->username) ?></td>
                <td><?= h($examinerOperator->email) ?></td>
                <td><?= $examinerOperator->has('person') ? $this->Html->link($examinerOperator->person->id, ['controller' => 'People', 'action' => 'view', $examinerOperator->person->id]) : '' ?></td>
                <td><?= $this->Number->format($examinerOperator->examiner_institution_id) ?></td>
                <td><?= h($examinerOperator->avatar_examiner) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $examinerOperator->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $examinerOperator->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $examinerOperator->id], ['confirm' => __('Are you sure you want to delete # {0}?', $examinerOperator->id)]) ?>
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
