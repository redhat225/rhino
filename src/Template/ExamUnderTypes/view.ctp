<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Exam Under Type'), ['action' => 'edit', $examUnderType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Exam Under Type'), ['action' => 'delete', $examUnderType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $examUnderType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Exam Under Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Exam Under Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Exam Types'), ['controller' => 'ExamTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Exam Type'), ['controller' => 'ExamTypes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="examUnderTypes view large-9 medium-8 columns content">
    <h3><?= h($examUnderType->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Exam Type') ?></th>
            <td><?= $examUnderType->has('exam_type') ? $this->Html->link($examUnderType->exam_type->id, ['controller' => 'ExamTypes', 'action' => 'view', $examUnderType->exam_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Label Exam Under Type') ?></th>
            <td><?= h($examUnderType->label_exam_under_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Template Exam') ?></th>
            <td><?= h($examUnderType->template_exam) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($examUnderType->id) ?></td>
        </tr>
    </table>
</div>
