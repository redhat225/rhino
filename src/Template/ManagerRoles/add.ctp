<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Manager Roles'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Manager Role Details'), ['controller' => 'ManagerRoleDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Manager Role Detail'), ['controller' => 'ManagerRoleDetails', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="managerRoles form large-9 medium-8 columns content">
    <?= $this->Form->create($managerRole) ?>
    <fieldset>
        <legend><?= __('Add Manager Role') ?></legend>
        <?php
            echo $this->Form->input('label_role');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
