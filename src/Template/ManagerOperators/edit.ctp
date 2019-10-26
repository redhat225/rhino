<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $managerOperator->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $managerOperator->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Manager Operators'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List People'), ['controller' => 'People', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Person'), ['controller' => 'People', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visit Meeting Invoices'), ['controller' => 'VisitMeetingInvoices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit Meeting Invoice'), ['controller' => 'VisitMeetingInvoices', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="managerOperators form large-9 medium-8 columns content">
    <?= $this->Form->create($managerOperator) ?>
    <fieldset>
        <legend><?= __('Edit Manager Operator') ?></legend>
        <?php
            echo $this->Form->input('people_id', ['options' => $people]);
            echo $this->Form->input('code');
            echo $this->Form->input('username');
            echo $this->Form->input('password');
            echo $this->Form->input('email');
            echo $this->Form->input('avatar_manager');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
