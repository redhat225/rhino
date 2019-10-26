<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Visit Invoice'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visits'), ['controller' => 'Visits', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit'), ['controller' => 'Visits', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visit Invoice Types'), ['controller' => 'VisitInvoiceTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit Invoice Type'), ['controller' => 'VisitInvoiceTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Manager Operators'), ['controller' => 'ManagerOperators', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Manager Operator'), ['controller' => 'ManagerOperators', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visit Invoice Details'), ['controller' => 'VisitInvoiceDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit Invoice Detail'), ['controller' => 'VisitInvoiceDetails', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visit Invoice Payments'), ['controller' => 'VisitInvoicePayments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit Invoice Payment'), ['controller' => 'VisitInvoicePayments', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="visitInvoices index large-9 medium-8 columns content">
    <h3><?= __('Visit Invoices') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('visit_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deleted') ?></th>
                <th scope="col"><?= $this->Paginator->sort('visit_invoice_type_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('manager_operator_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('state') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($visitInvoices as $visitInvoice): ?>
            <tr>
                <td><?= $this->Number->format($visitInvoice->id) ?></td>
                <td><?= $visitInvoice->has('visit') ? $this->Html->link($visitInvoice->visit->id, ['controller' => 'Visits', 'action' => 'view', $visitInvoice->visit->id]) : '' ?></td>
                <td><?= $this->Number->format($visitInvoice->amount) ?></td>
                <td><?= h($visitInvoice->created) ?></td>
                <td><?= h($visitInvoice->modified) ?></td>
                <td><?= h($visitInvoice->deleted) ?></td>
                <td><?= $visitInvoice->has('visit_invoice_type') ? $this->Html->link($visitInvoice->visit_invoice_type->id, ['controller' => 'VisitInvoiceTypes', 'action' => 'view', $visitInvoice->visit_invoice_type->id]) : '' ?></td>
                <td><?= $visitInvoice->has('manager_operator') ? $this->Html->link($visitInvoice->manager_operator->id, ['controller' => 'ManagerOperators', 'action' => 'view', $visitInvoice->manager_operator->id]) : '' ?></td>
                <td><?= $this->Number->format($visitInvoice->state) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $visitInvoice->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $visitInvoice->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $visitInvoice->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visitInvoice->id)]) ?>
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
