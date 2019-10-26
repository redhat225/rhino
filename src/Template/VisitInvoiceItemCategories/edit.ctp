<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $visitInvoiceItemCategory->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $visitInvoiceItemCategory->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Visit Invoice Item Categories'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Visit Invoice Items'), ['controller' => 'VisitInvoiceItems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit Invoice Item'), ['controller' => 'VisitInvoiceItems', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="visitInvoiceItemCategories form large-9 medium-8 columns content">
    <?= $this->Form->create($visitInvoiceItemCategory) ?>
    <fieldset>
        <legend><?= __('Edit Visit Invoice Item Category') ?></legend>
        <?php
            echo $this->Form->input('label_item_category');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
