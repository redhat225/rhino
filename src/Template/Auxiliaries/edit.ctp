<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $auxiliary->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $auxiliary->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Auxiliaries'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List People'), ['controller' => 'People', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Person'), ['controller' => 'People', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Auxiliary Act Details'), ['controller' => 'AuxiliaryActDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Auxiliary Act Detail'), ['controller' => 'AuxiliaryActDetails', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Auxiliary Role Details'), ['controller' => 'AuxiliaryRoleDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Auxiliary Role Detail'), ['controller' => 'AuxiliaryRoleDetails', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visit Constants'), ['controller' => 'VisitConstants', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit Constant'), ['controller' => 'VisitConstants', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visit Intervention Auxiliaries'), ['controller' => 'VisitInterventionAuxiliaries', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit Intervention Auxiliary'), ['controller' => 'VisitInterventionAuxiliaries', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visit Tasks'), ['controller' => 'VisitTasks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit Task'), ['controller' => 'VisitTasks', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="auxiliaries form large-9 medium-8 columns content">
    <?= $this->Form->create($auxiliary) ?>
    <fieldset>
        <legend><?= __('Edit Auxiliary') ?></legend>
        <?php
            echo $this->Form->input('code');
            echo $this->Form->input('username');
            echo $this->Form->input('password');
            echo $this->Form->input('people_id', ['options' => $people]);
            echo $this->Form->input('email');
            echo $this->Form->input('avatar_auxiliary');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
