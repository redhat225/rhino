<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Exam Note'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Exams'), ['controller' => 'Exams', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Exam'), ['controller' => 'Exams', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="examNotes index large-9 medium-8 columns content">
    <h3><?= __('Exam Notes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('exam_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('content_note') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('exam_evidence_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($examNotes as $examNote): ?>
            <tr>
                <td><?= $this->Number->format($examNote->id) ?></td>
                <td><?= $examNote->has('exam') ? $this->Html->link($examNote->exam->id, ['controller' => 'Exams', 'action' => 'view', $examNote->exam->id]) : '' ?></td>
                <td><?= h($examNote->content_note) ?></td>
                <td><?= h($examNote->created) ?></td>
                <td><?= h($examNote->modified) ?></td>
                <td><?= $this->Number->format($examNote->exam_evidence_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $examNote->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $examNote->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $examNote->id], ['confirm' => __('Are you sure you want to delete # {0}?', $examNote->id)]) ?>
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
