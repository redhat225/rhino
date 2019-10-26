<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Requirement Ingredient Fraction'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Requirement Active Fractions'), ['controller' => 'RequirementActiveFractions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Requirement Active Fraction'), ['controller' => 'RequirementActiveFractions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Requirement Active Ingredients'), ['controller' => 'RequirementActiveIngredients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Requirement Active Ingredient'), ['controller' => 'RequirementActiveIngredients', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Requirement Compositions'), ['controller' => 'RequirementCompositions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Requirement Composition'), ['controller' => 'RequirementCompositions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="requirementIngredientFractions index large-9 medium-8 columns content">
    <h3><?= __('Requirement Ingredient Fractions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('requirement_active_fraction_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('requirement_active_ingredient_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('requirement_composition_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('requirement_active_fraction_dosage') ?></th>
                <th scope="col"><?= $this->Paginator->sort('requirement_active_fraction_dosage_unity') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($requirementIngredientFractions as $requirementIngredientFraction): ?>
            <tr>
                <td><?= $this->Number->format($requirementIngredientFraction->id) ?></td>
                <td><?= $requirementIngredientFraction->has('requirement_active_fraction') ? $this->Html->link($requirementIngredientFraction->requirement_active_fraction->id, ['controller' => 'RequirementActiveFractions', 'action' => 'view', $requirementIngredientFraction->requirement_active_fraction->id]) : '' ?></td>
                <td><?= $requirementIngredientFraction->has('requirement_active_ingredient') ? $this->Html->link($requirementIngredientFraction->requirement_active_ingredient->id, ['controller' => 'RequirementActiveIngredients', 'action' => 'view', $requirementIngredientFraction->requirement_active_ingredient->id]) : '' ?></td>
                <td><?= $requirementIngredientFraction->has('requirement_composition') ? $this->Html->link($requirementIngredientFraction->requirement_composition->id, ['controller' => 'RequirementCompositions', 'action' => 'view', $requirementIngredientFraction->requirement_composition->id]) : '' ?></td>
                <td><?= h($requirementIngredientFraction->created) ?></td>
                <td><?= h($requirementIngredientFraction->modified) ?></td>
                <td><?= $this->Number->format($requirementIngredientFraction->requirement_active_fraction_dosage) ?></td>
                <td><?= h($requirementIngredientFraction->requirement_active_fraction_dosage_unity) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $requirementIngredientFraction->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $requirementIngredientFraction->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $requirementIngredientFraction->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requirementIngredientFraction->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
