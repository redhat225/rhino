<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Visit Invoice Items'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Visit Invoice Item Categories'), ['controller' => 'VisitInvoiceItemCategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit Invoice Item Category'), ['controller' => 'VisitInvoiceItemCategories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Institutions'), ['controller' => 'Institutions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Institution'), ['controller' => 'Institutions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visit Invoices'), ['controller' => 'VisitInvoices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit Invoice'), ['controller' => 'VisitInvoices', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="visitInvoiceItems form large-9 medium-8 columns content">
    <?= $this->Form->create($visitInvoiceItem) ?>
    <fieldset>
        <legend><?= __('Add Visit Invoice Item') ?></legend>
        <?php
            echo $this->Form->input('label_item');
            echo $this->Form->input('visit_invoice_item_category_id', ['options' => $visitInvoiceItemCategories]);
            echo $this->Form->input('institution_id', ['options' => $institutions]);
            echo $this->Form->input('visit_invoices._ids', ['options' => $visitInvoices]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
