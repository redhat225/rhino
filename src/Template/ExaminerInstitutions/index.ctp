<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Examiner Institution'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Institutions'), ['controller' => 'Institutions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Institution'), ['controller' => 'Institutions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="examinerInstitutions index large-9 medium-8 columns content">
    <h3><?= __('Examiner Institutions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fullname') ?></th>
                <th scope="col"><?= $this->Paginator->sort('path_logo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('institution_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($examinerInstitutions as $examinerInstitution): ?>
            <tr>
                <td><?= $this->Number->format($examinerInstitution->id) ?></td>
                <td><?= h($examinerInstitution->fullname) ?></td>
                <td><?= h($examinerInstitution->path_logo) ?></td>
                <td><?= $examinerInstitution->has('institution') ? $this->Html->link($examinerInstitution->institution->id, ['controller' => 'Institutions', 'action' => 'view', $examinerInstitution->institution->id]) : '' ?></td>
                <td><?= h($examinerInstitution->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $examinerInstitution->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $examinerInstitution->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $examinerInstitution->id], ['confirm' => __('Are you sure you want to delete # {0}?', $examinerInstitution->id)]) ?>
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
