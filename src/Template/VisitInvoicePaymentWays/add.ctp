<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Visit Invoice Payment Ways'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Visit Invoices'), ['controller' => 'VisitInvoices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit Invoice'), ['controller' => 'VisitInvoices', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="visitInvoicePaymentWays form large-9 medium-8 columns content">
    <?= $this->Form->create($visitInvoicePaymentWay) ?>
    <fieldset>
        <legend><?= __('Add Visit Invoice Payment Way') ?></legend>
        <?php
            echo $this->Form->input('label_way');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
