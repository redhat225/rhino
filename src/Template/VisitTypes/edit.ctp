<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $visitType->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $visitType->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Visit Types'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Visit Type Details'), ['controller' => 'VisitTypeDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit Type Detail'), ['controller' => 'VisitTypeDetails', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="visitTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($visitType) ?>
    <fieldset>
        <legend><?= __('Edit Visit Type') ?></legend>
        <?php
            echo $this->Form->input('label');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
