<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Requirement Significant Informations'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Requirements'), ['controller' => 'Requirements', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Requirement'), ['controller' => 'Requirements', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="requirementSignificantInformations form large-9 medium-8 columns content">
    <?= $this->Form->create($requirementSignificantInformation) ?>
    <fieldset>
        <legend><?= __('Add Requirement Significant Information') ?></legend>
        <?php
            echo $this->Form->input('begin');
            echo $this->Form->input('end', ['empty' => true]);
            echo $this->Form->input('information_label');
            echo $this->Form->input('information_url');
            echo $this->Form->input('requirement_id', ['options' => $requirements]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
