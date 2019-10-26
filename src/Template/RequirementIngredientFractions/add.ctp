<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Requirement Ingredient Fractions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Requirement Active Fractions'), ['controller' => 'RequirementActiveFractions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Requirement Active Fraction'), ['controller' => 'RequirementActiveFractions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Requirement Active Ingredients'), ['controller' => 'RequirementActiveIngredients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Requirement Active Ingredient'), ['controller' => 'RequirementActiveIngredients', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Requirement Compositions'), ['controller' => 'RequirementCompositions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Requirement Composition'), ['controller' => 'RequirementCompositions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="requirementIngredientFractions form large-9 medium-8 columns content">
    <?= $this->Form->create($requirementIngredientFraction) ?>
    <fieldset>
        <legend><?= __('Add Requirement Ingredient Fraction') ?></legend>
        <?php
            echo $this->Form->input('requirement_active_fraction_id', ['options' => $requirementActiveFractions]);
            echo $this->Form->input('requirement_active_ingredient_id', ['options' => $requirementActiveIngredients]);
            echo $this->Form->input('requirement_composition_id', ['options' => $requirementCompositions]);
            echo $this->Form->input('requirement_active_fraction_dosage');
            echo $this->Form->input('requirement_active_fraction_dosage_unity');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
