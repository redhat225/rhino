<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Exam Type'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Exam Under Types'), ['controller' => 'ExamUnderTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Exam Under Type'), ['controller' => 'ExamUnderTypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="examTypes index large-9 medium-8 columns content">
    <h3><?= __('Exam Types') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('exam_main_type_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('label_exam_type') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($examTypes as $examType): ?>
            <tr>
                <td><?= $this->Number->format($examType->id) ?></td>
                <td><?= $this->Number->format($examType->exam_main_type_id) ?></td>
                <td><?= h($examType->label_exam_type) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $examType->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $examType->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $examType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $examType->id)]) ?>
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
