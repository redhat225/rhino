<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Visit Type'), ['action' => 'edit', $visitType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Visit Type'), ['action' => 'delete', $visitType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visitType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Visit Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visit Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Visit Type Details'), ['controller' => 'VisitTypeDetails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visit Type Detail'), ['controller' => 'VisitTypeDetails', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="visitTypes view large-9 medium-8 columns content">
    <h3><?= h($visitType->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Label') ?></th>
            <td><?= h($visitType->label) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($visitType->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Visit Type Details') ?></h4>
        <?php if (!empty($visitType->visit_type_details)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Visit Id') ?></th>
                <th><?= __('Visit Type Id') ?></th>
                <th><?= __('Details') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($visitType->visit_type_details as $visitTypeDetails): ?>
            <tr>
                <td><?= h($visitTypeDetails->id) ?></td>
                <td><?= h($visitTypeDetails->visit_id) ?></td>
                <td><?= h($visitTypeDetails->visit_type_id) ?></td>
                <td><?= h($visitTypeDetails->details) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'VisitTypeDetails', 'action' => 'view', $visitTypeDetails->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'VisitTypeDetails', 'action' => 'edit', $visitTypeDetails->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'VisitTypeDetails', 'action' => 'delete', $visitTypeDetails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visitTypeDetails->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
