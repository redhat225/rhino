<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $requirementActiveIngredient->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $requirementActiveIngredient->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Requirement Active Ingredients'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Requirement Ingredient Fractions'), ['controller' => 'RequirementIngredientFractions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Requirement Ingredient Fraction'), ['controller' => 'RequirementIngredientFractions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Requirement Interactions'), ['controller' => 'RequirementInteractions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Requirement Interaction'), ['controller' => 'RequirementInteractions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Requirement Linked Active Ingredients'), ['controller' => 'RequirementLinkedActiveIngredients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Requirement Linked Active Ingredient'), ['controller' => 'RequirementLinkedActiveIngredients', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="requirementActiveIngredients form large-9 medium-8 columns content">
    <?= $this->Form->create($requirementActiveIngredient) ?>
    <fieldset>
        <legend><?= __('Edit Requirement Active Ingredient') ?></legend>
        <?php
            echo $this->Form->input('ingredient_label');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
