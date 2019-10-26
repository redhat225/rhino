<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Visit Kind Transport'), ['action' => 'edit', $visitKindTransport->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Visit Kind Transport'), ['action' => 'delete', $visitKindTransport->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visitKindTransport->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Visit Kind Transports'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visit Kind Transport'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Visits'), ['controller' => 'Visits', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visit'), ['controller' => 'Visits', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="visitKindTransports view large-9 medium-8 columns content">
    <h3><?= h($visitKindTransport->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Label') ?></th>
            <td><?= h($visitKindTransport->label) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($visitKindTransport->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Visits') ?></h4>
        <?php if (!empty($visitKindTransport->visits)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Institution Id') ?></th>
                <th><?= __('Visit Kind Transport Id') ?></th>
                <th><?= __('Visit Level Id') ?></th>
                <th><?= __('Doctor Id') ?></th>
                <th><?= __('Patient Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($visitKindTransport->visits as $visits): ?>
            <tr>
                <td><?= h($visits->id) ?></td>
                <td><?= h($visits->created) ?></td>
                <td><?= h($visits->institution_id) ?></td>
                <td><?= h($visits->visit_kind_transport_id) ?></td>
                <td><?= h($visits->visit_level_id) ?></td>
                <td><?= h($visits->doctor_id) ?></td>
                <td><?= h($visits->patient_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Visits', 'action' => 'view', $visits->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Visits', 'action' => 'edit', $visits->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Visits', 'action' => 'delete', $visits->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visits->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
