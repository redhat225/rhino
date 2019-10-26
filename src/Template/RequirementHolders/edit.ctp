<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $requirementHolder->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $requirementHolder->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Requirement Holders'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Country Townships'), ['controller' => 'CountryTownships', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Country Township'), ['controller' => 'CountryTownships', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Requirement Holder Details'), ['controller' => 'RequirementHolderDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Requirement Holder Detail'), ['controller' => 'RequirementHolderDetails', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="requirementHolders form large-9 medium-8 columns content">
    <?= $this->Form->create($requirementHolder) ?>
    <fieldset>
        <legend><?= __('Edit Requirement Holder') ?></legend>
        <?php
            echo $this->Form->input('holder_name');
            echo $this->Form->input('holder_adress');
            echo $this->Form->input('holder_contact');
            echo $this->Form->input('country_township_id', ['options' => $countryTownships]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
