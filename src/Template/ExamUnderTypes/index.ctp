<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Exam Under Type'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Exam Types'), ['controller' => 'ExamTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Exam Type'), ['controller' => 'ExamTypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="examUnderTypes index large-9 medium-8 columns content">
    <h3><?= __('Exam Under Types') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('exam_type_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('label_exam_under_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('template_exam') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($examUnderTypes as $examUnderType): ?>
            <tr>
                <td><?= $this->Number->format($examUnderType->id) ?></td>
                <td><?= $examUnderType->has('exam_type') ? $this->Html->link($examUnderType->exam_type->id, ['controller' => 'ExamTypes', 'action' => 'view', $examUnderType->exam_type->id]) : '' ?></td>
                <td><?= h($examUnderType->label_exam_under_type) ?></td>
                <td><?= h($examUnderType->template_exam) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $examUnderType->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $examUnderType->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $examUnderType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $examUnderType->id)]) ?>
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
