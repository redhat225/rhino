<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $auxiliaryAct->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $auxiliaryAct->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Auxiliary Acts'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Auxiliary Act Details'), ['controller' => 'AuxiliaryActDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Auxiliary Act Detail'), ['controller' => 'AuxiliaryActDetails', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="auxiliaryActs form large-9 medium-8 columns content">
    <?= $this->Form->create($auxiliaryAct) ?>
    <fieldset>
        <legend><?= __('Edit Auxiliary Act') ?></legend>
        <?php
            echo $this->Form->input('label_act');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
