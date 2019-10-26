<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Visit Invoice Item'), ['action' => 'edit', $visitInvoiceItem->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Visit Invoice Item'), ['action' => 'delete', $visitInvoiceItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visitInvoiceItem->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Visit Invoice Items'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visit Invoice Item'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Visit Invoice Item Categories'), ['controller' => 'VisitInvoiceItemCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visit Invoice Item Category'), ['controller' => 'VisitInvoiceItemCategories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Institutions'), ['controller' => 'Institutions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Institution'), ['controller' => 'Institutions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Visit Invoices'), ['controller' => 'VisitInvoices', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visit Invoice'), ['controller' => 'VisitInvoices', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="visitInvoiceItems view large-9 medium-8 columns content">
    <h3><?= h($visitInvoiceItem->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Label Item') ?></th>
            <td><?= h($visitInvoiceItem->label_item) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Visit Invoice Item Category') ?></th>
            <td><?= $visitInvoiceItem->has('visit_invoice_item_category') ? $this->Html->link($visitInvoiceItem->visit_invoice_item_category->id, ['controller' => 'VisitInvoiceItemCategories', 'action' => 'view', $visitInvoiceItem->visit_invoice_item_category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Institution') ?></th>
            <td><?= $visitInvoiceItem->has('institution') ? $this->Html->link($visitInvoiceItem->institution->id, ['controller' => 'Institutions', 'action' => 'view', $visitInvoiceItem->institution->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($visitInvoiceItem->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Visit Invoices') ?></h4>
        <?php if (!empty($visitInvoiceItem->visit_invoices)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Visit Id') ?></th>
                <th scope="col"><?= __('Label Invoice') ?></th>
                <th scope="col"><?= __('Code Invoice') ?></th>
                <th scope="col"><?= __('Amount') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Deleted') ?></th>
                <th scope="col"><?= __('Sold Date') ?></th>
                <th scope="col"><?= __('Path Invoice') ?></th>
                <th scope="col"><?= __('Visit Invoice Type Id') ?></th>
                <th scope="col"><?= __('Visit Invoice Payment Way Id') ?></th>
                <th scope="col"><?= __('Manager Operator Id') ?></th>
                <th scope="col"><?= __('State') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($visitInvoiceItem->visit_invoices as $visitInvoices): ?>
            <tr>
                <td><?= h($visitInvoices->id) ?></td>
                <td><?= h($visitInvoices->visit_id) ?></td>
                <td><?= h($visitInvoices->label_invoice) ?></td>
                <td><?= h($visitInvoices->code_invoice) ?></td>
                <td><?= h($visitInvoices->amount) ?></td>
                <td><?= h($visitInvoices->created) ?></td>
                <td><?= h($visitInvoices->modified) ?></td>
                <td><?= h($visitInvoices->deleted) ?></td>
                <td><?= h($visitInvoices->sold_date) ?></td>
                <td><?= h($visitInvoices->path_invoice) ?></td>
                <td><?= h($visitInvoices->visit_invoice_type_id) ?></td>
                <td><?= h($visitInvoices->visit_invoice_payment_way_id) ?></td>
                <td><?= h($visitInvoices->manager_operator_id) ?></td>
                <td><?= h($visitInvoices->state) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'VisitInvoices', 'action' => 'view', $visitInvoices->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'VisitInvoices', 'action' => 'edit', $visitInvoices->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'VisitInvoices', 'action' => 'delete', $visitInvoices->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visitInvoices->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
