<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $institutionAdress->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $institutionAdress->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Institution Adresses'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Institutions'), ['controller' => 'Institutions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Institution'), ['controller' => 'Institutions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="institutionAdresses form large-9 medium-8 columns content">
    <?= $this->Form->create($institutionAdress) ?>
    <fieldset>
        <legend><?= __('Edit Institution Adress') ?></legend>
        <?php
            echo $this->Form->input('fax');
            echo $this->Form->input('postal_box');
            echo $this->Form->input('contact1');
            echo $this->Form->input('contact2');
            echo $this->Form->input('institution_id', ['options' => $institutions]);
            echo $this->Form->input('email');
            echo $this->Form->input('website');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
