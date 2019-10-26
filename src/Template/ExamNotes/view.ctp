<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Exam Note'), ['action' => 'edit', $examNote->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Exam Note'), ['action' => 'delete', $examNote->id], ['confirm' => __('Are you sure you want to delete # {0}?', $examNote->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Exam Notes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Exam Note'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Exams'), ['controller' => 'Exams', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Exam'), ['controller' => 'Exams', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="examNotes view large-9 medium-8 columns content">
    <h3><?= h($examNote->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Exam') ?></th>
            <td><?= $examNote->has('exam') ? $this->Html->link($examNote->exam->id, ['controller' => 'Exams', 'action' => 'view', $examNote->exam->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Content Note') ?></th>
            <td><?= h($examNote->content_note) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($examNote->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Exam Evidence Id') ?></th>
            <td><?= $this->Number->format($examNote->exam_evidence_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($examNote->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($examNote->modified) ?></td>
        </tr>
    </table>
</div>
