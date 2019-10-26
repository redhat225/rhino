<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Visit Order Type'), ['action' => 'edit', $visitOrderType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Visit Order Type'), ['action' => 'delete', $visitOrderType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visitOrderType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Visit Order Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visit Order Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Visit Order Details'), ['controller' => 'VisitOrderDetails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visit Order Detail'), ['controller' => 'VisitOrderDetails', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="visitOrderTypes view large-9 medium-8 columns content">
    <h3><?= h($visitOrderType->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Label') ?></th>
            <td><?= h($visitOrderType->label) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($visitOrderType->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Visit Order Details') ?></h4>
        <?php if (!empty($visitOrderType->visit_order_details)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Visit Id') ?></th>
                <th><?= __('Path Evidence') ?></th>
                <th><?= __('Visit Order Type Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($visitOrderType->visit_order_details as $visitOrderDetails): ?>
            <tr>
                <td><?= h($visitOrderDetails->id) ?></td>
                <td><?= h($visitOrderDetails->visit_id) ?></td>
                <td><?= h($visitOrderDetails->path_evidence) ?></td>
                <td><?= h($visitOrderDetails->visit_order_type_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'VisitOrderDetails', 'action' => 'view', $visitOrderDetails->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'VisitOrderDetails', 'action' => 'edit', $visitOrderDetails->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'VisitOrderDetails', 'action' => 'delete', $visitOrderDetails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visitOrderDetails->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
