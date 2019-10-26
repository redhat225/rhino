<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Requirement Active Ingredient'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Requirement Ingredient Fractions'), ['controller' => 'RequirementIngredientFractions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Requirement Ingredient Fraction'), ['controller' => 'RequirementIngredientFractions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Requirement Interactions'), ['controller' => 'RequirementInteractions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Requirement Interaction'), ['controller' => 'RequirementInteractions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Requirement Linked Active Ingredients'), ['controller' => 'RequirementLinkedActiveIngredients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Requirement Linked Active Ingredient'), ['controller' => 'RequirementLinkedActiveIngredients', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="requirementActiveIngredients index large-9 medium-8 columns content">
    <h3><?= __('Requirement Active Ingredients') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ingredient_label') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($requirementActiveIngredients as $requirementActiveIngredient): ?>
            <tr>
                <td><?= $this->Number->format($requirementActiveIngredient->id) ?></td>
                <td><?= h($requirementActiveIngredient->ingredient_label) ?></td>
                <td><?= h($requirementActiveIngredient->created) ?></td>
                <td><?= h($requirementActiveIngredient->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $requirementActiveIngredient->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $requirementActiveIngredient->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $requirementActiveIngredient->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requirementActiveIngredient->id)]) ?>
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
