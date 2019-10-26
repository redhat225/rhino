<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Requirement Composition'), ['action' => 'edit', $requirementComposition->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Requirement Composition'), ['action' => 'delete', $requirementComposition->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requirementComposition->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Requirement Compositions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Requirement Composition'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Requirements'), ['controller' => 'Requirements', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Requirement'), ['controller' => 'Requirements', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Requirement Ingredient Fractions'), ['controller' => 'RequirementIngredientFractions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Requirement Ingredient Fraction'), ['controller' => 'RequirementIngredientFractions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Requirement Linked Active Ingredients'), ['controller' => 'RequirementLinkedActiveIngredients', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Requirement Linked Active Ingredient'), ['controller' => 'RequirementLinkedActiveIngredients', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="requirementCompositions view large-9 medium-8 columns content">
    <h3><?= h($requirementComposition->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Composition Dosage Reference') ?></th>
            <td><?= h($requirementComposition->composition_dosage_reference) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Composition Pharma Designation') ?></th>
            <td><?= h($requirementComposition->composition_pharma_designation) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Requirement') ?></th>
            <td><?= $requirementComposition->has('requirement') ? $this->Html->link($requirementComposition->requirement->id, ['controller' => 'Requirements', 'action' => 'view', $requirementComposition->requirement->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($requirementComposition->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Requirement Ingredient Fractions') ?></h4>
        <?php if (!empty($requirementComposition->requirement_ingredient_fractions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Requirement Active Fraction Id') ?></th>
                <th scope="col"><?= __('Requirement Active Ingredient Id') ?></th>
                <th scope="col"><?= __('Requirement Composition Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Requirement Active Fraction Dosage') ?></th>
                <th scope="col"><?= __('Requirement Active Fraction Dosage Unity') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($requirementComposition->requirement_ingredient_fractions as $requirementIngredientFractions): ?>
            <tr>
                <td><?= h($requirementIngredientFractions->id) ?></td>
                <td><?= h($requirementIngredientFractions->requirement_active_fraction_id) ?></td>
                <td><?= h($requirementIngredientFractions->requirement_active_ingredient_id) ?></td>
                <td><?= h($requirementIngredientFractions->requirement_composition_id) ?></td>
                <td><?= h($requirementIngredientFractions->created) ?></td>
                <td><?= h($requirementIngredientFractions->modified) ?></td>
                <td><?= h($requirementIngredientFractions->requirement_active_fraction_dosage) ?></td>
                <td><?= h($requirementIngredientFractions->requirement_active_fraction_dosage_unity) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'RequirementIngredientFractions', 'action' => 'view', $requirementIngredientFractions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'RequirementIngredientFractions', 'action' => 'edit', $requirementIngredientFractions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'RequirementIngredientFractions', 'action' => 'delete', $requirementIngredientFractions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requirementIngredientFractions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Requirement Linked Active Ingredients') ?></h4>
        <?php if (!empty($requirementComposition->requirement_linked_active_ingredients)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Requirement Composition Id') ?></th>
                <th scope="col"><?= __('Requirement Active Ingredient Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Active Dosage') ?></th>
                <th scope="col"><?= __('Active Dosage Unity') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($requirementComposition->requirement_linked_active_ingredients as $requirementLinkedActiveIngredients): ?>
            <tr>
                <td><?= h($requirementLinkedActiveIngredients->id) ?></td>
                <td><?= h($requirementLinkedActiveIngredients->requirement_composition_id) ?></td>
                <td><?= h($requirementLinkedActiveIngredients->requirement_active_ingredient_id) ?></td>
                <td><?= h($requirementLinkedActiveIngredients->created) ?></td>
                <td><?= h($requirementLinkedActiveIngredients->modified) ?></td>
                <td><?= h($requirementLinkedActiveIngredients->active_dosage) ?></td>
                <td><?= h($requirementLinkedActiveIngredients->active_dosage_unity) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'RequirementLinkedActiveIngredients', 'action' => 'view', $requirementLinkedActiveIngredients->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'RequirementLinkedActiveIngredients', 'action' => 'edit', $requirementLinkedActiveIngredients->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'RequirementLinkedActiveIngredients', 'action' => 'delete', $requirementLinkedActiveIngredients->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requirementLinkedActiveIngredients->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
