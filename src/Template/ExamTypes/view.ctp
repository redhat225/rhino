<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Exam Type'), ['action' => 'edit', $examType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Exam Type'), ['action' => 'delete', $examType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $examType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Exam Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Exam Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Exam Under Types'), ['controller' => 'ExamUnderTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Exam Under Type'), ['controller' => 'ExamUnderTypes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="examTypes view large-9 medium-8 columns content">
    <h3><?= h($examType->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Label Exam Type') ?></th>
            <td><?= h($examType->label_exam_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($examType->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Exam Main Type Id') ?></th>
            <td><?= $this->Number->format($examType->exam_main_type_id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Exam Under Types') ?></h4>
        <?php if (!empty($examType->exam_under_types)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Exam Type Id') ?></th>
                <th scope="col"><?= __('Label Exam Under Type') ?></th>
                <th scope="col"><?= __('Alias') ?></th>
                <th scope="col"><?= __('Template Exam') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($examType->exam_under_types as $examUnderTypes): ?>
            <tr>
                <td><?= h($examUnderTypes->id) ?></td>
                <td><?= h($examUnderTypes->created) ?></td>
                <td><?= h($examUnderTypes->modified) ?></td>
                <td><?= h($examUnderTypes->exam_type_id) ?></td>
                <td><?= h($examUnderTypes->label_exam_under_type) ?></td>
                <td><?= h($examUnderTypes->alias) ?></td>
                <td><?= h($examUnderTypes->template_exam) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ExamUnderTypes', 'action' => 'view', $examUnderTypes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ExamUnderTypes', 'action' => 'edit', $examUnderTypes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ExamUnderTypes', 'action' => 'delete', $examUnderTypes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $examUnderTypes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
