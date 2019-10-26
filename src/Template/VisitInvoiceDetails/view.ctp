<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Visit Invoice Detail'), ['action' => 'edit', $visitInvoiceDetail->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Visit Invoice Detail'), ['action' => 'delete', $visitInvoiceDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visitInvoiceDetail->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Visit Invoice Details'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visit Invoice Detail'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Visit Invoices'), ['controller' => 'VisitInvoices', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visit Invoice'), ['controller' => 'VisitInvoices', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Visit Invoice Items'), ['controller' => 'VisitInvoiceItems', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visit Invoice Item'), ['controller' => 'VisitInvoiceItems', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="visitInvoiceDetails view large-9 medium-8 columns content">
    <h3><?= h($visitInvoiceDetail->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Visit Invoice') ?></th>
            <td><?= $visitInvoiceDetail->has('visit_invoice') ? $this->Html->link($visitInvoiceDetail->visit_invoice->id, ['controller' => 'VisitInvoices', 'action' => 'view', $visitInvoiceDetail->visit_invoice->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Visit Invoice Item') ?></th>
            <td><?= $visitInvoiceDetail->has('visit_invoice_item') ? $this->Html->link($visitInvoiceDetail->visit_invoice_item->id, ['controller' => 'VisitInvoiceItems', 'action' => 'view', $visitInvoiceDetail->visit_invoice_item->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Details') ?></th>
            <td><?= h($visitInvoiceDetail->details) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($visitInvoiceDetail->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Qty') ?></th>
            <td><?= $this->Number->format($visitInvoiceDetail->qty) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount') ?></th>
            <td><?= $this->Number->format($visitInvoiceDetail->amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($visitInvoiceDetail->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($visitInvoiceDetail->modified) ?></td>
        </tr>
    </table>
</div>
