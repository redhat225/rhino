<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Manager Acts'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="managerActs form large-9 medium-8 columns content">
    <?= $this->Form->create($managerAct) ?>
    <fieldset>
        <legend><?= __('Add Manager Act') ?></legend>
        <?php
            echo $this->Form->input('label_manager_act');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
