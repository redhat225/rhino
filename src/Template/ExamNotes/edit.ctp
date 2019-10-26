<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $examNote->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $examNote->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Exam Notes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Exams'), ['controller' => 'Exams', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Exam'), ['controller' => 'Exams', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="examNotes form large-9 medium-8 columns content">
    <?= $this->Form->create($examNote) ?>
    <fieldset>
        <legend><?= __('Edit Exam Note') ?></legend>
        <?php
            echo $this->Form->input('exam_id', ['options' => $exams]);
            echo $this->Form->input('content_note');
            echo $this->Form->input('exam_evidence_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
