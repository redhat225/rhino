<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Visit Types'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Visit Type Details'), ['controller' => 'VisitTypeDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit Type Detail'), ['controller' => 'VisitTypeDetails', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="visitTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($visitType) ?>
    <fieldset>
        <legend><?= __('Add Visit Type') ?></legend>
        <?php
            echo $this->Form->input('label');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
