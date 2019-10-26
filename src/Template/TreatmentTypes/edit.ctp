<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $treatmentType->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $treatmentType->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Treatment Types'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Treatments'), ['controller' => 'Treatments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Treatment'), ['controller' => 'Treatments', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="treatmentTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($treatmentType) ?>
    <fieldset>
        <legend><?= __('Edit Treatment Type') ?></legend>
        <?php
            echo $this->Form->input('label');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
