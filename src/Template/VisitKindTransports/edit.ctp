<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $visitKindTransport->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $visitKindTransport->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Visit Kind Transports'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Visits'), ['controller' => 'Visits', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit'), ['controller' => 'Visits', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="visitKindTransports form large-9 medium-8 columns content">
    <?= $this->Form->create($visitKindTransport) ?>
    <fieldset>
        <legend><?= __('Edit Visit Kind Transport') ?></legend>
        <?php
            echo $this->Form->input('label');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
