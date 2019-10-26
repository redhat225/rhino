<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $visitStateOrderDetail->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $visitStateOrderDetail->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Visit State Order Details'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Visit States'), ['controller' => 'VisitStates', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit State'), ['controller' => 'VisitStates', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visit State Order Types'), ['controller' => 'VisitStateOrderTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit State Order Type'), ['controller' => 'VisitStateOrderTypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="visitStateOrderDetails form large-9 medium-8 columns content">
    <?= $this->Form->create($visitStateOrderDetail) ?>
    <fieldset>
        <legend><?= __('Edit Visit State Order Detail') ?></legend>
        <?php
            echo $this->Form->input('path_order_details');
            echo $this->Form->input('visit_state_id', ['options' => $visitStates]);
            echo $this->Form->input('visit_state_order_type_id', ['options' => $visitStateOrderTypes]);
            echo $this->Form->input('additional_details');
            echo $this->Form->input('created_by');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
