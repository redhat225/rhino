<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Visit Act Sub Category'), ['action' => 'edit', $visitActSubCategory->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Visit Act Sub Category'), ['action' => 'delete', $visitActSubCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visitActSubCategory->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Visit Act Sub Categories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visit Act Sub Category'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Visit Act Categories'), ['controller' => 'VisitActCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visit Act Category'), ['controller' => 'VisitActCategories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Visit Acts'), ['controller' => 'VisitActs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visit Act'), ['controller' => 'VisitActs', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="visitActSubCategories view large-9 medium-8 columns content">
    <h3><?= h($visitActSubCategory->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Visit Act Category') ?></th>
            <td><?= $visitActSubCategory->has('visit_act_category') ? $this->Html->link($visitActSubCategory->visit_act_category->id, ['controller' => 'VisitActCategories', 'action' => 'view', $visitActSubCategory->visit_act_category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Label Sub Category') ?></th>
            <td><?= h($visitActSubCategory->label_sub_category) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($visitActSubCategory->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Visit Acts') ?></h4>
        <?php if (!empty($visitActSubCategory->visit_acts)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Label') ?></th>
                <th scope="col"><?= __('Visit Act Sub Category Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($visitActSubCategory->visit_acts as $visitActs): ?>
            <tr>
                <td><?= h($visitActs->id) ?></td>
                <td><?= h($visitActs->label) ?></td>
                <td><?= h($visitActs->visit_act_sub_category_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'VisitActs', 'action' => 'view', $visitActs->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'VisitActs', 'action' => 'edit', $visitActs->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'VisitActs', 'action' => 'delete', $visitActs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visitActs->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
