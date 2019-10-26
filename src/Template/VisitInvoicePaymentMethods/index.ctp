<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Visit Invoice Payment Method'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visit Invoices'), ['controller' => 'VisitInvoices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit Invoice'), ['controller' => 'VisitInvoices', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="visitInvoicePaymentMethods index large-9 medium-8 columns content">
    <h3><?= __('Visit Invoice Payment Methods') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('label') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($visitInvoicePaymentMethods as $visitInvoicePaymentMethod): ?>
            <tr>
                <td><?= $this->Number->format($visitInvoicePaymentMethod->id) ?></td>
                <td><?= h($visitInvoicePaymentMethod->label) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $visitInvoicePaymentMethod->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $visitInvoicePaymentMethod->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $visitInvoicePaymentMethod->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visitInvoicePaymentMethod->id)]) ?>
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
