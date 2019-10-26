<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Exam Main Type'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Exam Types'), ['controller' => 'ExamTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Exam Type'), ['controller' => 'ExamTypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="examMainTypes index large-9 medium-8 columns content">
    <h3><?= __('Exam Main Types') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('label_main_type') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($examMainTypes as $examMainType): ?>
            <tr>
                <td><?= $this->Number->format($examMainType->id) ?></td>
                <td><?= h($examMainType->label_main_type) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $examMainType->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $examMainType->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $examMainType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $examMainType->id)]) ?>
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
