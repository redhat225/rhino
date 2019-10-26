<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $visitState->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $visitState->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Visit States'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Visit State Types'), ['controller' => 'VisitStateTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit State Type'), ['controller' => 'VisitStateTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visits'), ['controller' => 'Visits', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit'), ['controller' => 'Visits', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visit Levels'), ['controller' => 'VisitLevels', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit Level'), ['controller' => 'VisitLevels', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visit Kind Transports'), ['controller' => 'VisitKindTransports', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit Kind Transport'), ['controller' => 'VisitKindTransports', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visit State Order Details'), ['controller' => 'VisitStateOrderDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit State Order Detail'), ['controller' => 'VisitStateOrderDetails', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="visitStates form large-9 medium-8 columns content">
    <?= $this->Form->create($visitState) ?>
    <fieldset>
        <legend><?= __('Edit Visit State') ?></legend>
        <?php
            echo $this->Form->input('visit_state_type_id', ['options' => $visitStateTypes]);
            echo $this->Form->input('visit_id', ['options' => $visits]);
            echo $this->Form->input('visit_level_id', ['options' => $visitLevels]);
            echo $this->Form->input('visit_kind_transport_id', ['options' => $visitKindTransports]);
            echo $this->Form->input('visit_authorized');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
