<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Requirement Ingredient Fraction'), ['action' => 'edit', $requirementIngredientFraction->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Requirement Ingredient Fraction'), ['action' => 'delete', $requirementIngredientFraction->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requirementIngredientFraction->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Requirement Ingredient Fractions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Requirement Ingredient Fraction'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Requirement Active Fractions'), ['controller' => 'RequirementActiveFractions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Requirement Active Fraction'), ['controller' => 'RequirementActiveFractions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Requirement Active Ingredients'), ['controller' => 'RequirementActiveIngredients', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Requirement Active Ingredient'), ['controller' => 'RequirementActiveIngredients', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Requirement Compositions'), ['controller' => 'RequirementCompositions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Requirement Composition'), ['controller' => 'RequirementCompositions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="requirementIngredientFractions view large-9 medium-8 columns content">
    <h3><?= h($requirementIngredientFraction->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Requirement Active Fraction') ?></th>
            <td><?= $requirementIngredientFraction->has('requirement_active_fraction') ? $this->Html->link($requirementIngredientFraction->requirement_active_fraction->id, ['controller' => 'RequirementActiveFractions', 'action' => 'view', $requirementIngredientFraction->requirement_active_fraction->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Requirement Active Ingredient') ?></th>
            <td><?= $requirementIngredientFraction->has('requirement_active_ingredient') ? $this->Html->link($requirementIngredientFraction->requirement_active_ingredient->id, ['controller' => 'RequirementActiveIngredients', 'action' => 'view', $requirementIngredientFraction->requirement_active_ingredient->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Requirement Composition') ?></th>
            <td><?= $requirementIngredientFraction->has('requirement_composition') ? $this->Html->link($requirementIngredientFraction->requirement_composition->id, ['controller' => 'RequirementCompositions', 'action' => 'view', $requirementIngredientFraction->requirement_composition->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Requirement Active Fraction Dosage Unity') ?></th>
            <td><?= h($requirementIngredientFraction->requirement_active_fraction_dosage_unity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($requirementIngredientFraction->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Requirement Active Fraction Dosage') ?></th>
            <td><?= $this->Number->format($requirementIngredientFraction->requirement_active_fraction_dosage) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($requirementIngredientFraction->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($requirementIngredientFraction->modified) ?></td>
        </tr>
    </table>
</div>
