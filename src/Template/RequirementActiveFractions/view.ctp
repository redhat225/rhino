<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Requirement Active Fraction'), ['action' => 'edit', $requirementActiveFraction->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Requirement Active Fraction'), ['action' => 'delete', $requirementActiveFraction->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requirementActiveFraction->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Requirement Active Fractions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Requirement Active Fraction'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Requirement Ingredient Fractions'), ['controller' => 'RequirementIngredientFractions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Requirement Ingredient Fraction'), ['controller' => 'RequirementIngredientFractions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="requirementActiveFractions view large-9 medium-8 columns content">
    <h3><?= h($requirementActiveFraction->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Fraction Label') ?></th>
            <td><?= h($requirementActiveFraction->fraction_label) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($requirementActiveFraction->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($requirementActiveFraction->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($requirementActiveFraction->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Requirement Ingredient Fractions') ?></h4>
        <?php if (!empty($requirementActiveFraction->requirement_ingredient_fractions)): ?>
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
            <?php foreach ($requirementActiveFraction->requirement_ingredient_fractions as $requirementIngredientFractions): ?>
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
</div>
