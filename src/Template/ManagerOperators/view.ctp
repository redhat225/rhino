<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Manager Operator'), ['action' => 'edit', $managerOperator->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Manager Operator'), ['action' => 'delete', $managerOperator->id], ['confirm' => __('Are you sure you want to delete # {0}?', $managerOperator->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Manager Operators'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Manager Operator'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List People'), ['controller' => 'People', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Person'), ['controller' => 'People', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Visit Meeting Invoices'), ['controller' => 'VisitMeetingInvoices', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visit Meeting Invoice'), ['controller' => 'VisitMeetingInvoices', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="managerOperators view large-9 medium-8 columns content">
    <h3><?= h($managerOperator->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Person') ?></th>
            <td><?= $managerOperator->has('person') ? $this->Html->link($managerOperator->person->id, ['controller' => 'People', 'action' => 'view', $managerOperator->person->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Code') ?></th>
            <td><?= h($managerOperator->code) ?></td>
        </tr>
        <tr>
            <th><?= __('Username') ?></th>
            <td><?= h($managerOperator->username) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($managerOperator->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Avatar Manager') ?></th>
            <td><?= h($managerOperator->avatar_manager) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($managerOperator->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Password') ?></h4>
        <?= $this->Text->autoParagraph(h($managerOperator->password)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Visit Meeting Invoices') ?></h4>
        <?php if (!empty($managerOperator->visit_meeting_invoices)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Code') ?></th>
                <th><?= __('Amount') ?></th>
                <th><?= __('Manager Operator Id') ?></th>
                <th><?= __('Visit Meeting Payment Method Id') ?></th>
                <th><?= __('Path Invoice') ?></th>
                <th><?= __('Visit Meeting Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($managerOperator->visit_meeting_invoices as $visitMeetingInvoices): ?>
            <tr>
                <td><?= h($visitMeetingInvoices->id) ?></td>
                <td><?= h($visitMeetingInvoices->code) ?></td>
                <td><?= h($visitMeetingInvoices->amount) ?></td>
                <td><?= h($visitMeetingInvoices->manager_operator_id) ?></td>
                <td><?= h($visitMeetingInvoices->visit_meeting_payment_method_id) ?></td>
                <td><?= h($visitMeetingInvoices->path_invoice) ?></td>
                <td><?= h($visitMeetingInvoices->visit_meeting_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'VisitMeetingInvoices', 'action' => 'view', $visitMeetingInvoices->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'VisitMeetingInvoices', 'action' => 'edit', $visitMeetingInvoices->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'VisitMeetingInvoices', 'action' => 'delete', $visitMeetingInvoices->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visitMeetingInvoices->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
