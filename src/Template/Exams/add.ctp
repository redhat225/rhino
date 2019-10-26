<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Exams'), ['action' => 'index']) ?></li>
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
<div class="exams form large-9 medium-8 columns content">
    <?= $this->Form->create($exam) ?>
    <fieldset>
        <legend><?= __('Add Exam') ?></legend>
        <?php
            echo $this->Form->input('visit_meeting_id', ['options' => $visitMeetings]);
            echo $this->Form->input('obs_exam');
            echo $this->Form->input('exam_under_type_id');
            echo $this->Form->input('result_exam');
            echo $this->Form->input('codexam');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
