<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Visit Order Types'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Visit Order Details'), ['controller' => 'VisitOrderDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit Order Detail'), ['controller' => 'VisitOrderDetails', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="visitOrderTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($visitOrderType) ?>
    <fieldset>
        <legend><?= __('Add Visit Order Type') ?></legend>
        <?php
            echo $this->Form->input('label');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
