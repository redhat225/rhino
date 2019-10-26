<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Requirement Active Fractions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Requirement Ingredient Fractions'), ['controller' => 'RequirementIngredientFractions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Requirement Ingredient Fraction'), ['controller' => 'RequirementIngredientFractions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="requirementActiveFractions form large-9 medium-8 columns content">
    <?= $this->Form->create($requirementActiveFraction) ?>
    <fieldset>
        <legend><?= __('Add Requirement Active Fraction') ?></legend>
        <?php
            echo $this->Form->input('fraction_label');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
