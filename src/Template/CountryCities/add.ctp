<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Country Cities'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Countries'), ['controller' => 'Countries', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Country'), ['controller' => 'Countries', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Country Townships'), ['controller' => 'CountryTownships', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Country Township'), ['controller' => 'CountryTownships', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="countryCities form large-9 medium-8 columns content">
    <?= $this->Form->create($countryCity) ?>
    <fieldset>
        <legend><?= __('Add Country City') ?></legend>
        <?php
            echo $this->Form->input('label_city');
            echo $this->Form->input('country_id', ['options' => $countries]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
