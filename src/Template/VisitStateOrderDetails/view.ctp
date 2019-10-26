<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Visit State Order Detail'), ['action' => 'edit', $visitStateOrderDetail->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Visit State Order Detail'), ['action' => 'delete', $visitStateOrderDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visitStateOrderDetail->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Visit State Order Details'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visit State Order Detail'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Visit States'), ['controller' => 'VisitStates', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visit State'), ['controller' => 'VisitStates', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Visit State Order Types'), ['controller' => 'VisitStateOrderTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visit State Order Type'), ['controller' => 'VisitStateOrderTypes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="visitStateOrderDetails view large-9 medium-8 columns content">
    <h3><?= h($visitStateOrderDetail->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Visit State') ?></th>
            <td><?= $visitStateOrderDetail->has('visit_state') ? $this->Html->link($visitStateOrderDetail->visit_state->id, ['controller' => 'VisitStates', 'action' => 'view', $visitStateOrderDetail->visit_state->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Visit State Order Type') ?></th>
            <td><?= $visitStateOrderDetail->has('visit_state_order_type') ? $this->Html->link($visitStateOrderDetail->visit_state_order_type->id, ['controller' => 'VisitStateOrderTypes', 'action' => 'view', $visitStateOrderDetail->visit_state_order_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= h($visitStateOrderDetail->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($visitStateOrderDetail->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($visitStateOrderDetail->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($visitStateOrderDetail->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Path Order Details') ?></h4>
        <?= $this->Text->autoParagraph(h($visitStateOrderDetail->path_order_details)); ?>
    </div>
    <div class="row">
        <h4><?= __('Additional Details') ?></h4>
        <?= $this->Text->autoParagraph(h($visitStateOrderDetail->additional_details)); ?>
    </div>
</div>
