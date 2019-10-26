<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Auxiliary Roles'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Auxiliary Role Details'), ['controller' => 'AuxiliaryRoleDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Auxiliary Role Detail'), ['controller' => 'AuxiliaryRoleDetails', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="auxiliaryRoles form large-9 medium-8 columns content">
    <?= $this->Form->create($auxiliaryRole) ?>
    <fieldset>
        <legend><?= __('Add Auxiliary Role') ?></legend>
        <?php
            echo $this->Form->input('label_role');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
