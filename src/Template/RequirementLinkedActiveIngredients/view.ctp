<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Requirement Linked Active Ingredient'), ['action' => 'edit', $requirementLinkedActiveIngredient->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Requirement Linked Active Ingredient'), ['action' => 'delete', $requirementLinkedActiveIngredient->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requirementLinkedActiveIngredient->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Requirement Linked Active Ingredients'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Requirement Linked Active Ingredient'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Requirement Compositions'), ['controller' => 'RequirementCompositions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Requirement Composition'), ['controller' => 'RequirementCompositions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Requirement Active Ingredients'), ['controller' => 'RequirementActiveIngredients', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Requirement Active Ingredient'), ['controller' => 'RequirementActiveIngredients', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="requirementLinkedActiveIngredients view large-9 medium-8 columns content">
    <h3><?= h($requirementLinkedActiveIngredient->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Requirement Composition') ?></th>
            <td><?= $requirementLinkedActiveIngredient->has('requirement_composition') ? $this->Html->link($requirementLinkedActiveIngredient->requirement_composition->id, ['controller' => 'RequirementCompositions', 'action' => 'view', $requirementLinkedActiveIngredient->requirement_composition->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Requirement Active Ingredient') ?></th>
            <td><?= $requirementLinkedActiveIngredient->has('requirement_active_ingredient') ? $this->Html->link($requirementLinkedActiveIngredient->requirement_active_ingredient->id, ['controller' => 'RequirementActiveIngredients', 'action' => 'view', $requirementLinkedActiveIngredient->requirement_active_ingredient->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active Dosage Unity') ?></th>
            <td><?= h($requirementLinkedActiveIngredient->active_dosage_unity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($requirementLinkedActiveIngredient->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active Dosage') ?></th>
            <td><?= $this->Number->format($requirementLinkedActiveIngredient->active_dosage) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($requirementLinkedActiveIngredient->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($requirementLinkedActiveIngredient->modified) ?></td>
        </tr>
    </table>
</div>
