<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Visit State'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visit State Types'), ['controller' => 'VisitStateTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit State Type'), ['controller' => 'VisitStateTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visits'), ['controller' => 'Visits', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit'), ['controller' => 'Visits', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visit Levels'), ['controller' => 'VisitLevels', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit Level'), ['controller' => 'VisitLevels', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visit Kind Transports'), ['controller' => 'VisitKindTransports', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit Kind Transport'), ['controller' => 'VisitKindTransports', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visit State Order Details'), ['controller' => 'VisitStateOrderDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit State Order Detail'), ['controller' => 'VisitStateOrderDetails', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="visitStates index large-9 medium-8 columns content">
    <h3><?= __('Visit States') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('visit_state_type_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('visit_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('visit_level_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('visit_kind_transport_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('visit_authorized') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($visitStates as $visitState): ?>
            <tr>
                <td><?= $this->Number->format($visitState->id) ?></td>
                <td><?= h($visitState->created) ?></td>
                <td><?= h($visitState->modified) ?></td>
                <td><?= $visitState->has('visit_state_type') ? $this->Html->link($visitState->visit_state_type->id, ['controller' => 'VisitStateTypes', 'action' => 'view', $visitState->visit_state_type->id]) : '' ?></td>
                <td><?= $visitState->has('visit') ? $this->Html->link($visitState->visit->id, ['controller' => 'Visits', 'action' => 'view', $visitState->visit->id]) : '' ?></td>
                <td><?= $visitState->has('visit_level') ? $this->Html->link($visitState->visit_level->id, ['controller' => 'VisitLevels', 'action' => 'view', $visitState->visit_level->id]) : '' ?></td>
                <td><?= $visitState->has('visit_kind_transport') ? $this->Html->link($visitState->visit_kind_transport->id, ['controller' => 'VisitKindTransports', 'action' => 'view', $visitState->visit_kind_transport->id]) : '' ?></td>
                <td><?= h($visitState->visit_authorized) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $visitState->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $visitState->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $visitState->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visitState->id)]) ?>
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
