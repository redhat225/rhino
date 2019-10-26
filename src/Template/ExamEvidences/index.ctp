<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Exam Evidence'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Exams'), ['controller' => 'Exams', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Exam'), ['controller' => 'Exams', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="examEvidences index large-9 medium-8 columns content">
    <h3><?= __('Exam Evidences') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('exam_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('path_evidence') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($examEvidences as $examEvidence): ?>
            <tr>
                <td><?= $this->Number->format($examEvidence->id) ?></td>
                <td><?= $examEvidence->has('exam') ? $this->Html->link($examEvidence->exam->id, ['controller' => 'Exams', 'action' => 'view', $examEvidence->exam->id]) : '' ?></td>
                <td><?= h($examEvidence->path_evidence) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $examEvidence->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $examEvidence->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $examEvidence->id], ['confirm' => __('Are you sure you want to delete # {0}?', $examEvidence->id)]) ?>
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
