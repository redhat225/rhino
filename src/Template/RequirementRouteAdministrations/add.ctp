<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Requirement Route Administrations'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Requirement Route Administration Types'), ['controller' => 'RequirementRouteAdministrationTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Requirement Route Administration Type'), ['controller' => 'RequirementRouteAdministrationTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Requirements'), ['controller' => 'Requirements', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Requirement'), ['controller' => 'Requirements', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="requirementRouteAdministrations form large-9 medium-8 columns content">
    <?= $this->Form->create($requirementRouteAdministration) ?>
    <fieldset>
        <legend><?= __('Add Requirement Route Administration') ?></legend>
        <?php
            echo $this->Form->input('requirement_route_administration_type_id', ['options' => $requirementRouteAdministrationTypes]);
            echo $this->Form->input('requirement_id', ['options' => $requirements]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
