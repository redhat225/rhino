<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $visitInvoicePaymentMethod->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $visitInvoicePaymentMethod->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Visit Invoice Payment Methods'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Visit Invoices'), ['controller' => 'VisitInvoices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit Invoice'), ['controller' => 'VisitInvoices', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="visitInvoicePaymentMethods form large-9 medium-8 columns content">
    <?= $this->Form->create($visitInvoicePaymentMethod) ?>
    <fieldset>
        <legend><?= __('Edit Visit Invoice Payment Method') ?></legend>
        <?php
            echo $this->Form->input('label');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
