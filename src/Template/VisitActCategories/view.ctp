<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Visit Act Category'), ['action' => 'edit', $visitActCategory->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Visit Act Category'), ['action' => 'delete', $visitActCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visitActCategory->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Visit Act Categories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visit Act Category'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Visit Act Sub Categories'), ['controller' => 'VisitActSubCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visit Act Sub Category'), ['controller' => 'VisitActSubCategories', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="visitActCategories view large-9 medium-8 columns content">
    <h3><?= h($visitActCategory->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Code Category') ?></th>
            <td><?= h($visitActCategory->code_category) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Code Main Category') ?></th>
            <td><?= h($visitActCategory->code_main_category) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($visitActCategory->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Visit Act Sub Categories') ?></h4>
        <?php if (!empty($visitActCategory->visit_act_sub_categories)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Visit Act Category Id') ?></th>
                <th scope="col"><?= __('Label Sub Category') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($visitActCategory->visit_act_sub_categories as $visitActSubCategories): ?>
            <tr>
                <td><?= h($visitActSubCategories->id) ?></td>
                <td><?= h($visitActSubCategories->visit_act_category_id) ?></td>
                <td><?= h($visitActSubCategories->label_sub_category) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'VisitActSubCategories', 'action' => 'view', $visitActSubCategories->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'VisitActSubCategories', 'action' => 'edit', $visitActSubCategories->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'VisitActSubCategories', 'action' => 'delete', $visitActSubCategories->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visitActSubCategories->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
