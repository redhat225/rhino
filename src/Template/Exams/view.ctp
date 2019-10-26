<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Exam'), ['action' => 'edit', $exam->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Exam'), ['action' => 'delete', $exam->id], ['confirm' => __('Are you sure you want to delete # {0}?', $exam->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Exams'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Exam'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Visit Meetings'), ['controller' => 'VisitMeetings', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visit Meeting'), ['controller' => 'VisitMeetings', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Exam Types'), ['controller' => 'ExamTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Exam Type'), ['controller' => 'ExamTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Exam Evidences'), ['controller' => 'ExamEvidences', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Exam Evidence'), ['controller' => 'ExamEvidences', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Exam Notes'), ['controller' => 'ExamNotes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Exam Note'), ['controller' => 'ExamNotes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="exams view large-9 medium-8 columns content">
    <h3><?= h($exam->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Visit Meeting') ?></th>
            <td><?= $exam->has('visit_meeting') ? $this->Html->link($exam->visit_meeting->id, ['controller' => 'VisitMeetings', 'action' => 'view', $exam->visit_meeting->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Obs Exam') ?></th>
            <td><?= h($exam->obs_exam) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Result Exam') ?></th>
            <td><?= h($exam->result_exam) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($exam->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Exam Under Type Id') ?></th>
            <td><?= $this->Number->format($exam->exam_under_type_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Codexam') ?></th>
            <td><?= $this->Number->format($exam->codexam) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($exam->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($exam->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Exam Evidences') ?></h4>
        <?php if (!empty($exam->exam_evidences)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Exam Id') ?></th>
                <th scope="col"><?= __('Path Evidence') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($exam->exam_evidences as $examEvidences): ?>
            <tr>
                <td><?= h($examEvidences->id) ?></td>
                <td><?= h($examEvidences->exam_id) ?></td>
                <td><?= h($examEvidences->path_evidence) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ExamEvidences', 'action' => 'view', $examEvidences->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ExamEvidences', 'action' => 'edit', $examEvidences->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ExamEvidences', 'action' => 'delete', $examEvidences->id], ['confirm' => __('Are you sure you want to delete # {0}?', $examEvidences->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Exam Notes') ?></h4>
        <?php if (!empty($exam->exam_notes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Exam Id') ?></th>
                <th scope="col"><?= __('Content Note') ?></th>
                <th scope="col"><?= __('Priority Note') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($exam->exam_notes as $examNotes): ?>
            <tr>
                <td><?= h($examNotes->id) ?></td>
                <td><?= h($examNotes->exam_id) ?></td>
                <td><?= h($examNotes->content_note) ?></td>
                <td><?= h($examNotes->priority_note) ?></td>
                <td><?= h($examNotes->created) ?></td>
                <td><?= h($examNotes->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ExamNotes', 'action' => 'view', $examNotes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ExamNotes', 'action' => 'edit', $examNotes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ExamNotes', 'action' => 'delete', $examNotes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $examNotes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
