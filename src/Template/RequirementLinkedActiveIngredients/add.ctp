<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Requirement Linked Active Ingredients'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Requirement Compositions'), ['controller' => 'RequirementCompositions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Requirement Composition'), ['controller' => 'RequirementCompositions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Requirement Active Ingredients'), ['controller' => 'RequirementActiveIngredients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Requirement Active Ingredient'), ['controller' => 'RequirementActiveIngredients', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="requirementLinkedActiveIngredients form large-9 medium-8 columns content">
    <?= $this->Form->create($requirementLinkedActiveIngredient) ?>
    <fieldset>
        <legend><?= __('Add Requirement Linked Active Ingredient') ?></legend>
        <?php
            echo $this->Form->input('requirement_composition_id', ['options' => $requirementCompositions]);
            echo $this->Form->input('requirement_active_ingredient_id', ['options' => $requirementActiveIngredients]);
            echo $this->Form->input('active_dosage');
            echo $this->Form->input('active_dosage_unity');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
