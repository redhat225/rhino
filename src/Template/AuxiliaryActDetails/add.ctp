<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Auxiliary Act Details'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Auxiliaries'), ['controller' => 'Auxiliaries', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Auxiliary'), ['controller' => 'Auxiliaries', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Auxiliary Acts'), ['controller' => 'AuxiliaryActs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Auxiliary Act'), ['controller' => 'AuxiliaryActs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="auxiliaryActDetails form large-9 medium-8 columns content">
    <?= $this->Form->create($auxiliaryActDetail) ?>
    <fieldset>
        <legend><?= __('Add Auxiliary Act Detail') ?></legend>
        <?php
            echo $this->Form->input('auxiliary_id', ['options' => $auxiliaries]);
            echo $this->Form->input('auxiliary_act_id', ['options' => $auxiliaryActs]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
