<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Requirement Active Ingredient'), ['action' => 'edit', $requirementActiveIngredient->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Requirement Active Ingredient'), ['action' => 'delete', $requirementActiveIngredient->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requirementActiveIngredient->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Requirement Active Ingredients'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Requirement Active Ingredient'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Requirement Ingredient Fractions'), ['controller' => 'RequirementIngredientFractions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Requirement Ingredient Fraction'), ['controller' => 'RequirementIngredientFractions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Requirement Interactions'), ['controller' => 'RequirementInteractions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Requirement Interaction'), ['controller' => 'RequirementInteractions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Requirement Linked Active Ingredients'), ['controller' => 'RequirementLinkedActiveIngredients', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Requirement Linked Active Ingredient'), ['controller' => 'RequirementLinkedActiveIngredients', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="requirementActiveIngredients view large-9 medium-8 columns content">
    <h3><?= h($requirementActiveIngredient->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Ingredient Label') ?></th>
            <td><?= h($requirementActiveIngredient->ingredient_label) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($requirementActiveIngredient->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($requirementActiveIngredient->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($requirementActiveIngredient->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Requirement Ingredient Fractions') ?></h4>
        <?php if (!empty($requirementActiveIngredient->requirement_ingredient_fractions)): ?>
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
            <?php foreach ($requirementActiveIngredient->requirement_ingredient_fractions as $requirementIngredientFractions): ?>
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
        <h4><?= __('Related Requirement Interactions') ?></h4>
        <?php if (!empty($requirementActiveIngredient->requirement_interactions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Requirement Active Ingredient Id') ?></th>
                <th scope="col"><?= __('Interaction Family Name 1') ?></th>
                <th scope="col"><?= __('Interaction Family 1 Id') ?></th>
                <th scope="col"><?= __('Interaction Family Name 2') ?></th>
                <th scope="col"><?= __('Interaction Family 2 Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($requirementActiveIngredient->requirement_interactions as $requirementInteractions): ?>
            <tr>
                <td><?= h($requirementInteractions->id) ?></td>
                <td><?= h($requirementInteractions->requirement_active_ingredient_id) ?></td>
                <td><?= h($requirementInteractions->interaction_family_name_1) ?></td>
                <td><?= h($requirementInteractions->interaction_family_1_id) ?></td>
                <td><?= h($requirementInteractions->interaction_family_name_2) ?></td>
                <td><?= h($requirementInteractions->interaction_family_2_id) ?></td>
                <td><?= h($requirementInteractions->created) ?></td>
                <td><?= h($requirementInteractions->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'RequirementInteractions', 'action' => 'view', $requirementInteractions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'RequirementInteractions', 'action' => 'edit', $requirementInteractions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'RequirementInteractions', 'action' => 'delete', $requirementInteractions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requirementInteractions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Requirement Linked Active Ingredients') ?></h4>
        <?php if (!empty($requirementActiveIngredient->requirement_linked_active_ingredients)): ?>
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
            <?php foreach ($requirementActiveIngredient->requirement_linked_active_ingredients as $requirementLinkedActiveIngredients): ?>
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
