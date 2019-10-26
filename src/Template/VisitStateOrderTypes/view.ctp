<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Visit State Order Type'), ['action' => 'edit', $visitStateOrderType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Visit State Order Type'), ['action' => 'delete', $visitStateOrderType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visitStateOrderType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Visit State Order Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visit State Order Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Visit States'), ['controller' => 'VisitStates', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visit State'), ['controller' => 'VisitStates', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="visitStateOrderTypes view large-9 medium-8 columns content">
    <h3><?= h($visitStateOrderType->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Label Order Type') ?></th>
            <td><?= h($visitStateOrderType->label_order_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($visitStateOrderType->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Visit States') ?></h4>
        <?php if (!empty($visitStateOrderType->visit_states)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('State Begin') ?></th>
                <th scope="col"><?= __('State End') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Visit State Type Id') ?></th>
                <th scope="col"><?= __('Visit Id') ?></th>
                <th scope="col"><?= __('Visit Level Id') ?></th>
                <th scope="col"><?= __('Visit Kind Transport Id') ?></th>
                <th scope="col"><?= __('Visit Authorized') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($visitStateOrderType->visit_states as $visitStates): ?>
            <tr>
                <td><?= h($visitStates->id) ?></td>
                <td><?= h($visitStates->created) ?></td>
                <td><?= h($visitStates->state_begin) ?></td>
                <td><?= h($visitStates->state_end) ?></td>
                <td><?= h($visitStates->modified) ?></td>
                <td><?= h($visitStates->visit_state_type_id) ?></td>
                <td><?= h($visitStates->visit_id) ?></td>
                <td><?= h($visitStates->visit_level_id) ?></td>
                <td><?= h($visitStates->visit_kind_transport_id) ?></td>
                <td><?= h($visitStates->visit_authorized) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'VisitStates', 'action' => 'view', $visitStates->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'VisitStates', 'action' => 'edit', $visitStates->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'VisitStates', 'action' => 'delete', $visitStates->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visitStates->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
