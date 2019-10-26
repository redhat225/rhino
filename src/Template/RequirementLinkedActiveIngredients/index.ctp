<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Requirement Linked Active Ingredient'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Requirement Compositions'), ['controller' => 'RequirementCompositions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Requirement Composition'), ['controller' => 'RequirementCompositions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Requirement Active Ingredients'), ['controller' => 'RequirementActiveIngredients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Requirement Active Ingredient'), ['controller' => 'RequirementActiveIngredients', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="requirementLinkedActiveIngredients index large-9 medium-8 columns content">
    <h3><?= __('Requirement Linked Active Ingredients') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('requirement_composition_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('requirement_active_ingredient_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active_dosage') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active_dosage_unity') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($requirementLinkedActiveIngredients as $requirementLinkedActiveIngredient): ?>
            <tr>
                <td><?= $this->Number->format($requirementLinkedActiveIngredient->id) ?></td>
                <td><?= $requirementLinkedActiveIngredient->has('requirement_composition') ? $this->Html->link($requirementLinkedActiveIngredient->requirement_composition->id, ['controller' => 'RequirementCompositions', 'action' => 'view', $requirementLinkedActiveIngredient->requirement_composition->id]) : '' ?></td>
                <td><?= $requirementLinkedActiveIngredient->has('requirement_active_ingredient') ? $this->Html->link($requirementLinkedActiveIngredient->requirement_active_ingredient->id, ['controller' => 'RequirementActiveIngredients', 'action' => 'view', $requirementLinkedActiveIngredient->requirement_active_ingredient->id]) : '' ?></td>
                <td><?= h($requirementLinkedActiveIngredient->created) ?></td>
                <td><?= h($requirementLinkedActiveIngredient->modified) ?></td>
                <td><?= $this->Number->format($requirementLinkedActiveIngredient->active_dosage) ?></td>
                <td><?= h($requirementLinkedActiveIngredient->active_dosage_unity) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $requirementLinkedActiveIngredient->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $requirementLinkedActiveIngredient->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $requirementLinkedActiveIngredient->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requirementLinkedActiveIngredient->id)]) ?>
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
