<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $countryTownship->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $countryTownship->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Country Townships'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Country Cities'), ['controller' => 'CountryCities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Country City'), ['controller' => 'CountryCities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Institutions'), ['controller' => 'Institutions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Institution'), ['controller' => 'Institutions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List People Adresses'), ['controller' => 'PeopleAdresses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New People Adress'), ['controller' => 'PeopleAdresses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Requirement Holders'), ['controller' => 'RequirementHolders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Requirement Holder'), ['controller' => 'RequirementHolders', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="countryTownships form large-9 medium-8 columns content">
    <?= $this->Form->create($countryTownship) ?>
    <fieldset>
        <legend><?= __('Edit Country Township') ?></legend>
        <?php
            echo $this->Form->input('country_city_id', ['options' => $countryCities]);
            echo $this->Form->input('label_township');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
