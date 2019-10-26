<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Requirement Compositions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Requirements'), ['controller' => 'Requirements', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Requirement'), ['controller' => 'Requirements', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Requirement Ingredient Fractions'), ['controller' => 'RequirementIngredientFractions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Requirement Ingredient Fraction'), ['controller' => 'RequirementIngredientFractions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Requirement Linked Active Ingredients'), ['controller' => 'RequirementLinkedActiveIngredients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Requirement Linked Active Ingredient'), ['controller' => 'RequirementLinkedActiveIngredients', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="requirementCompositions form large-9 medium-8 columns content">
    <?= $this->Form->create($requirementComposition) ?>
    <fieldset>
        <legend><?= __('Add Requirement Composition') ?></legend>
        <?php
            echo $this->Form->input('composition_dosage_reference');
            echo $this->Form->input('composition_pharma_designation');
            echo $this->Form->input('requirement_id', ['options' => $requirements]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
