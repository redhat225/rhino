<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Visit Invoice'), ['action' => 'edit', $visitInvoice->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Visit Invoice'), ['action' => 'delete', $visitInvoice->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visitInvoice->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Visit Invoices'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visit Invoice'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Visits'), ['controller' => 'Visits', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visit'), ['controller' => 'Visits', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Visit Invoice Types'), ['controller' => 'VisitInvoiceTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visit Invoice Type'), ['controller' => 'VisitInvoiceTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Manager Operators'), ['controller' => 'ManagerOperators', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Manager Operator'), ['controller' => 'ManagerOperators', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Visit Invoice Details'), ['controller' => 'VisitInvoiceDetails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visit Invoice Detail'), ['controller' => 'VisitInvoiceDetails', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Visit Invoice Payments'), ['controller' => 'VisitInvoicePayments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visit Invoice Payment'), ['controller' => 'VisitInvoicePayments', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="visitInvoices view large-9 medium-8 columns content">
    <h3><?= h($visitInvoice->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Visit') ?></th>
            <td><?= $visitInvoice->has('visit') ? $this->Html->link($visitInvoice->visit->id, ['controller' => 'Visits', 'action' => 'view', $visitInvoice->visit->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Visit Invoice Type') ?></th>
            <td><?= $visitInvoice->has('visit_invoice_type') ? $this->Html->link($visitInvoice->visit_invoice_type->id, ['controller' => 'VisitInvoiceTypes', 'action' => 'view', $visitInvoice->visit_invoice_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Manager Operator') ?></th>
            <td><?= $visitInvoice->has('manager_operator') ? $this->Html->link($visitInvoice->manager_operator->id, ['controller' => 'ManagerOperators', 'action' => 'view', $visitInvoice->manager_operator->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($visitInvoice->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount') ?></th>
            <td><?= $this->Number->format($visitInvoice->amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('State') ?></th>
            <td><?= $this->Number->format($visitInvoice->state) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($visitInvoice->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($visitInvoice->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deleted') ?></th>
            <td><?= h($visitInvoice->deleted) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Visit Invoice Details') ?></h4>
        <?php if (!empty($visitInvoice->visit_invoice_details)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Visit Invoice Id') ?></th>
                <th scope="col"><?= __('Details') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($visitInvoice->visit_invoice_details as $visitInvoiceDetails): ?>
            <tr>
                <td><?= h($visitInvoiceDetails->id) ?></td>
                <td><?= h($visitInvoiceDetails->visit_invoice_id) ?></td>
                <td><?= h($visitInvoiceDetails->details) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'VisitInvoiceDetails', 'action' => 'view', $visitInvoiceDetails->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'VisitInvoiceDetails', 'action' => 'edit', $visitInvoiceDetails->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'VisitInvoiceDetails', 'action' => 'delete', $visitInvoiceDetails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visitInvoiceDetails->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Visit Invoice Payments') ?></h4>
        <?php if (!empty($visitInvoice->visit_invoice_payments)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Amount') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Deleted') ?></th>
                <th scope="col"><?= __('Reference Payment') ?></th>
                <th scope="col"><?= __('Code Payment') ?></th>
                <th scope="col"><?= __('Path Payment') ?></th>
                <th scope="col"><?= __('Visit Invoice Id') ?></th>
                <th scope="col"><?= __('Visit Invoice Payment Method Id') ?></th>
                <th scope="col"><?= __('State') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($visitInvoice->visit_invoice_payments as $visitInvoicePayments): ?>
            <tr>
                <td><?= h($visitInvoicePayments->id) ?></td>
                <td><?= h($visitInvoicePayments->amount) ?></td>
                <td><?= h($visitInvoicePayments->created) ?></td>
                <td><?= h($visitInvoicePayments->modified) ?></td>
                <td><?= h($visitInvoicePayments->deleted) ?></td>
                <td><?= h($visitInvoicePayments->reference_payment) ?></td>
                <td><?= h($visitInvoicePayments->code_payment) ?></td>
                <td><?= h($visitInvoicePayments->path_payment) ?></td>
                <td><?= h($visitInvoicePayments->visit_invoice_id) ?></td>
                <td><?= h($visitInvoicePayments->visit_invoice_payment_method_id) ?></td>
                <td><?= h($visitInvoicePayments->state) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'VisitInvoicePayments', 'action' => 'view', $visitInvoicePayments->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'VisitInvoicePayments', 'action' => 'edit', $visitInvoicePayments->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'VisitInvoicePayments', 'action' => 'delete', $visitInvoicePayments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visitInvoicePayments->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
