<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $requirementIssueList->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $requirementIssueList->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Requirement Issue Lists'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Requirements'), ['controller' => 'Requirements', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Requirement'), ['controller' => 'Requirements', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="requirementIssueLists form large-9 medium-8 columns content">
    <?= $this->Form->create($requirementIssueList) ?>
    <fieldset>
        <legend><?= __('Edit Requirement Issue List') ?></legend>
        <?php
            echo $this->Form->input('list_decsription');
            echo $this->Form->input('requirement_id', ['options' => $requirements]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
