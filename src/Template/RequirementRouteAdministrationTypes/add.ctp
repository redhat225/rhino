<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Requirement Route Administration Types'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Requirement Route Administrations'), ['controller' => 'RequirementRouteAdministrations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Requirement Route Administration'), ['controller' => 'RequirementRouteAdministrations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="requirementRouteAdministrationTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($requirementRouteAdministrationType) ?>
    <fieldset>
        <legend><?= __('Add Requirement Route Administration Type') ?></legend>
        <?php
            echo $this->Form->input('type_label');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
