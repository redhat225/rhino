<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Visit Invoice Type'), ['action' => 'edit', $visitInvoiceType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Visit Invoice Type'), ['action' => 'delete', $visitInvoiceType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visitInvoiceType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Visit Invoice Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visit Invoice Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Visit Invoices'), ['controller' => 'VisitInvoices', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visit Invoice'), ['controller' => 'VisitInvoices', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="visitInvoiceTypes view large-9 medium-8 columns content">
    <h3><?= h($visitInvoiceType->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Label') ?></th>
            <td><?= h($visitInvoiceType->label) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($visitInvoiceType->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Visit Invoices') ?></h4>
        <?php if (!empty($visitInvoiceType->visit_invoices)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Visit Id') ?></th>
                <th><?= __('Amount') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Deleted') ?></th>
                <th><?= __('Visit Invoice Type Id') ?></th>
                <th><?= __('Visit Invoice Payment Method Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($visitInvoiceType->visit_invoices as $visitInvoices): ?>
            <tr>
                <td><?= h($visitInvoices->id) ?></td>
                <td><?= h($visitInvoices->visit_id) ?></td>
                <td><?= h($visitInvoices->amount) ?></td>
                <td><?= h($visitInvoices->created) ?></td>
                <td><?= h($visitInvoices->modified) ?></td>
                <td><?= h($visitInvoices->deleted) ?></td>
                <td><?= h($visitInvoices->visit_invoice_type_id) ?></td>
                <td><?= h($visitInvoices->visit_invoice_payment_method_id) ?></td>
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
