<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Visit State'), ['action' => 'edit', $visitState->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Visit State'), ['action' => 'delete', $visitState->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visitState->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Visit States'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visit State'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Visit State Types'), ['controller' => 'VisitStateTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visit State Type'), ['controller' => 'VisitStateTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Visits'), ['controller' => 'Visits', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visit'), ['controller' => 'Visits', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Visit Levels'), ['controller' => 'VisitLevels', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visit Level'), ['controller' => 'VisitLevels', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Visit Kind Transports'), ['controller' => 'VisitKindTransports', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visit Kind Transport'), ['controller' => 'VisitKindTransports', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Visit State Order Details'), ['controller' => 'VisitStateOrderDetails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visit State Order Detail'), ['controller' => 'VisitStateOrderDetails', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="visitStates view large-9 medium-8 columns content">
    <h3><?= h($visitState->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Visit State Type') ?></th>
            <td><?= $visitState->has('visit_state_type') ? $this->Html->link($visitState->visit_state_type->id, ['controller' => 'VisitStateTypes', 'action' => 'view', $visitState->visit_state_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Visit') ?></th>
            <td><?= $visitState->has('visit') ? $this->Html->link($visitState->visit->id, ['controller' => 'Visits', 'action' => 'view', $visitState->visit->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Visit Level') ?></th>
            <td><?= $visitState->has('visit_level') ? $this->Html->link($visitState->visit_level->id, ['controller' => 'VisitLevels', 'action' => 'view', $visitState->visit_level->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Visit Kind Transport') ?></th>
            <td><?= $visitState->has('visit_kind_transport') ? $this->Html->link($visitState->visit_kind_transport->id, ['controller' => 'VisitKindTransports', 'action' => 'view', $visitState->visit_kind_transport->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($visitState->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($visitState->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($visitState->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Visit Authorized') ?></th>
            <td><?= $visitState->visit_authorized ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Visit State Order Details') ?></h4>
        <?php if (!empty($visitState->visit_state_order_details)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Path Order Details') ?></th>
                <th scope="col"><?= __('Visit State Id') ?></th>
                <th scope="col"><?= __('Visit State Order Type Id') ?></th>
                <th scope="col"><?= __('Additional Details') ?></th>
                <th scope="col"><?= __('Created By') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($visitState->visit_state_order_details as $visitStateOrderDetails): ?>
            <tr>
                <td><?= h($visitStateOrderDetails->id) ?></td>
                <td><?= h($visitStateOrderDetails->created) ?></td>
                <td><?= h($visitStateOrderDetails->modified) ?></td>
                <td><?= h($visitStateOrderDetails->path_order_details) ?></td>
                <td><?= h($visitStateOrderDetails->visit_state_id) ?></td>
                <td><?= h($visitStateOrderDetails->visit_state_order_type_id) ?></td>
                <td><?= h($visitStateOrderDetails->additional_details) ?></td>
                <td><?= h($visitStateOrderDetails->created_by) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'VisitStateOrderDetails', 'action' => 'view', $visitStateOrderDetails->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'VisitStateOrderDetails', 'action' => 'edit', $visitStateOrderDetails->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'VisitStateOrderDetails', 'action' => 'delete', $visitStateOrderDetails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visitStateOrderDetails->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
