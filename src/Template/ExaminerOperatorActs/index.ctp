<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Examiner Operator Act'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Examiner Operator Act Details'), ['controller' => 'ExaminerOperatorActDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Examiner Operator Act Detail'), ['controller' => 'ExaminerOperatorActDetails', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="examinerOperatorActs index large-9 medium-8 columns content">
    <h3><?= __('Examiner Operator Acts') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('label_examiner_op_act') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($examinerOperatorActs as $examinerOperatorAct): ?>
            <tr>
                <td><?= $this->Number->format($examinerOperatorAct->id) ?></td>
                <td><?= h($examinerOperatorAct->label_examiner_op_act) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $examinerOperatorAct->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $examinerOperatorAct->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $examinerOperatorAct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $examinerOperatorAct->id)]) ?>
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
