<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Visit Invoice Item Category'), ['action' => 'edit', $visitInvoiceItemCategory->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Visit Invoice Item Category'), ['action' => 'delete', $visitInvoiceItemCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visitInvoiceItemCategory->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Visit Invoice Item Categories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visit Invoice Item Category'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Visit Invoice Items'), ['controller' => 'VisitInvoiceItems', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visit Invoice Item'), ['controller' => 'VisitInvoiceItems', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="visitInvoiceItemCategories view large-9 medium-8 columns content">
    <h3><?= h($visitInvoiceItemCategory->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Label Item Category') ?></th>
            <td><?= h($visitInvoiceItemCategory->label_item_category) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($visitInvoiceItemCategory->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Visit Invoice Items') ?></h4>
        <?php if (!empty($visitInvoiceItemCategory->visit_invoice_items)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Label Item') ?></th>
                <th scope="col"><?= __('Visit Invoice Item Category Id') ?></th>
                <th scope="col"><?= __('Institution Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($visitInvoiceItemCategory->visit_invoice_items as $visitInvoiceItems): ?>
            <tr>
                <td><?= h($visitInvoiceItems->id) ?></td>
                <td><?= h($visitInvoiceItems->label_item) ?></td>
                <td><?= h($visitInvoiceItems->visit_invoice_item_category_id) ?></td>
                <td><?= h($visitInvoiceItems->institution_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'VisitInvoiceItems', 'action' => 'view', $visitInvoiceItems->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'VisitInvoiceItems', 'action' => 'edit', $visitInvoiceItems->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'VisitInvoiceItems', 'action' => 'delete', $visitInvoiceItems->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visitInvoiceItems->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
