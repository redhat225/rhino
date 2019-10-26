<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Exam'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visit Meetings'), ['controller' => 'VisitMeetings', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit Meeting'), ['controller' => 'VisitMeetings', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Exam Types'), ['controller' => 'ExamTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Exam Type'), ['controller' => 'ExamTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Exam Evidences'), ['controller' => 'ExamEvidences', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Exam Evidence'), ['controller' => 'ExamEvidences', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Exam Notes'), ['controller' => 'ExamNotes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Exam Note'), ['controller' => 'ExamNotes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="exams index large-9 medium-8 columns content">
    <h3><?= __('Exams') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('visit_meeting_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('obs_exam') ?></th>
                <th scope="col"><?= $this->Paginator->sort('exam_under_type_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('result_exam') ?></th>
                <th scope="col"><?= $this->Paginator->sort('codexam') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($exams as $exam): ?>
            <tr>
                <td><?= $this->Number->format($exam->id) ?></td>
                <td><?= $exam->has('visit_meeting') ? $this->Html->link($exam->visit_meeting->id, ['controller' => 'VisitMeetings', 'action' => 'view', $exam->visit_meeting->id]) : '' ?></td>
                <td><?= h($exam->obs_exam) ?></td>
                <td><?= $this->Number->format($exam->exam_under_type_id) ?></td>
                <td><?= h($exam->created) ?></td>
                <td><?= h($exam->modified) ?></td>
                <td><?= h($exam->result_exam) ?></td>
                <td><?= $this->Number->format($exam->codexam) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $exam->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $exam->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $exam->id], ['confirm' => __('Are you sure you want to delete # {0}?', $exam->id)]) ?>
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
