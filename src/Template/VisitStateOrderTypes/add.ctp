<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Visit State Order Types'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Visit States'), ['controller' => 'VisitStates', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit State'), ['controller' => 'VisitStates', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="visitStateOrderTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($visitStateOrderType) ?>
    <fieldset>
        <legend><?= __('Add Visit State Order Type') ?></legend>
        <?php
            echo $this->Form->input('label_order_type');
            echo $this->Form->input('visit_states._ids', ['options' => $visitStates]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
