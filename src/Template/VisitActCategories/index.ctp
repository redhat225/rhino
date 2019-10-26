<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Visit Act Category'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visit Act Sub Categories'), ['controller' => 'VisitActSubCategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit Act Sub Category'), ['controller' => 'VisitActSubCategories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="visitActCategories index large-9 medium-8 columns content">
    <h3><?= __('Visit Act Categories') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('code_category') ?></th>
                <th scope="col"><?= $this->Paginator->sort('code_main_category') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($visitActCategories as $visitActCategory): ?>
            <tr>
                <td><?= $this->Number->format($visitActCategory->id) ?></td>
                <td><?= h($visitActCategory->code_category) ?></td>
                <td><?= h($visitActCategory->code_main_category) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $visitActCategory->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $visitActCategory->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $visitActCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visitActCategory->id)]) ?>
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
