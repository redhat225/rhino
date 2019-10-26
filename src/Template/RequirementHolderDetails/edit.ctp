<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $requirementHolderDetail->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $requirementHolderDetail->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Requirement Holder Details'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Requirement Holders'), ['controller' => 'RequirementHolders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Requirement Holder'), ['controller' => 'RequirementHolders', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Requirements'), ['controller' => 'Requirements', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Requirement'), ['controller' => 'Requirements', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="requirementHolderDetails form large-9 medium-8 columns content">
    <?= $this->Form->create($requirementHolderDetail) ?>
    <fieldset>
        <legend><?= __('Edit Requirement Holder Detail') ?></legend>
        <?php
            echo $this->Form->input('requirement_holder_id', ['options' => $requirementHolders]);
            echo $this->Form->input('requirement_id', ['options' => $requirements]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
