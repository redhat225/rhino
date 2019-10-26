<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Auxiliary Role Details'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Auxiliaries'), ['controller' => 'Auxiliaries', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Auxiliary'), ['controller' => 'Auxiliaries', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Auxiliary Roles'), ['controller' => 'AuxiliaryRoles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Auxiliary Role'), ['controller' => 'AuxiliaryRoles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="auxiliaryRoleDetails form large-9 medium-8 columns content">
    <?= $this->Form->create($auxiliaryRoleDetail) ?>
    <fieldset>
        <legend><?= __('Add Auxiliary Role Detail') ?></legend>
        <?php
            echo $this->Form->input('auxiliary_id', ['options' => $auxiliaries]);
            echo $this->Form->input('auxiliary_role_id', ['options' => $auxiliaryRoles]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
