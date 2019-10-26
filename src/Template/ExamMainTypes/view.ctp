<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Exam Main Type'), ['action' => 'edit', $examMainType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Exam Main Type'), ['action' => 'delete', $examMainType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $examMainType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Exam Main Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Exam Main Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Exam Types'), ['controller' => 'ExamTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Exam Type'), ['controller' => 'ExamTypes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="examMainTypes view large-9 medium-8 columns content">
    <h3><?= h($examMainType->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Label Main Type') ?></th>
            <td><?= h($examMainType->label_main_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($examMainType->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Exam Types') ?></h4>
        <?php if (!empty($examMainType->exam_types)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Exam Main Type Id') ?></th>
                <th scope="col"><?= __('Label Exam Type') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($examMainType->exam_types as $examTypes): ?>
            <tr>
                <td><?= h($examTypes->id) ?></td>
                <td><?= h($examTypes->exam_main_type_id) ?></td>
                <td><?= h($examTypes->label_exam_type) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ExamTypes', 'action' => 'view', $examTypes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ExamTypes', 'action' => 'edit', $examTypes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ExamTypes', 'action' => 'delete', $examTypes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $examTypes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
