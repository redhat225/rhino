<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Exam Evidence'), ['action' => 'edit', $examEvidence->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Exam Evidence'), ['action' => 'delete', $examEvidence->id], ['confirm' => __('Are you sure you want to delete # {0}?', $examEvidence->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Exam Evidences'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Exam Evidence'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Exams'), ['controller' => 'Exams', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Exam'), ['controller' => 'Exams', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="examEvidences view large-9 medium-8 columns content">
    <h3><?= h($examEvidence->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Exam') ?></th>
            <td><?= $examEvidence->has('exam') ? $this->Html->link($examEvidence->exam->id, ['controller' => 'Exams', 'action' => 'view', $examEvidence->exam->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Path Evidence') ?></th>
            <td><?= h($examEvidence->path_evidence) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($examEvidence->id) ?></td>
        </tr>
    </table>
</div>
