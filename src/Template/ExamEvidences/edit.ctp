<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $examEvidence->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $examEvidence->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Exam Evidences'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Exams'), ['controller' => 'Exams', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Exam'), ['controller' => 'Exams', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="examEvidences form large-9 medium-8 columns content">
    <?= $this->Form->create($examEvidence) ?>
    <fieldset>
        <legend><?= __('Edit Exam Evidence') ?></legend>
        <?php
            echo $this->Form->input('exam_id', ['options' => $exams]);
            echo $this->Form->input('path_evidence');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
