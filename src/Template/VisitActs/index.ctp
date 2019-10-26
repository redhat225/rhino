<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Visit Act'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visit Act Sub Categories'), ['controller' => 'VisitActSubCategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit Act Sub Category'), ['controller' => 'VisitActSubCategories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visit Act Auxiliary Details'), ['controller' => 'VisitActAuxiliaryDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit Act Auxiliary Detail'), ['controller' => 'VisitActAuxiliaryDetails', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visit Act Doctor Details'), ['controller' => 'VisitActDoctorDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit Act Doctor Detail'), ['controller' => 'VisitActDoctorDetails', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="visitActs index large-9 medium-8 columns content">
    <h3><?= __('Visit Acts') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('label') ?></th>
                <th scope="col"><?= $this->Paginator->sort('visit_act_sub_category_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($visitActs as $visitAct): ?>
            <tr>
                <td><?= $this->Number->format($visitAct->id) ?></td>
                <td><?= h($visitAct->label) ?></td>
                <td><?= $visitAct->has('visit_act_sub_category') ? $this->Html->link($visitAct->visit_act_sub_category->id, ['controller' => 'VisitActSubCategories', 'action' => 'view', $visitAct->visit_act_sub_category->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $visitAct->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $visitAct->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $visitAct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visitAct->id)]) ?>
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
