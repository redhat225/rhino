<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Countries'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Country Cities'), ['controller' => 'CountryCities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Country City'), ['controller' => 'CountryCities', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="countries form large-9 medium-8 columns content">
    <?= $this->Form->create($country) ?>
    <fieldset>
        <legend><?= __('Add Country') ?></legend>
        <?php
            echo $this->Form->input('label_country');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
