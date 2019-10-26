<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Requirement Interactions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Requirement Active Ingredients'), ['controller' => 'RequirementActiveIngredients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Requirement Active Ingredient'), ['controller' => 'RequirementActiveIngredients', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="requirementInteractions form large-9 medium-8 columns content">
    <?= $this->Form->create($requirementInteraction) ?>
    <fieldset>
        <legend><?= __('Add Requirement Interaction') ?></legend>
        <?php
            echo $this->Form->input('requirement_active_ingredient_id', ['options' => $requirementActiveIngredients]);
            echo $this->Form->input('interaction_family_name_1');
            echo $this->Form->input('interaction_family_1_id');
            echo $this->Form->input('interaction_family_name_2');
            echo $this->Form->input('interaction_family_2_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
