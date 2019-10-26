<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Requirement Interaction'), ['action' => 'edit', $requirementInteraction->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Requirement Interaction'), ['action' => 'delete', $requirementInteraction->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requirementInteraction->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Requirement Interactions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Requirement Interaction'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Requirement Active Ingredients'), ['controller' => 'RequirementActiveIngredients', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Requirement Active Ingredient'), ['controller' => 'RequirementActiveIngredients', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="requirementInteractions view large-9 medium-8 columns content">
    <h3><?= h($requirementInteraction->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Requirement Active Ingredient') ?></th>
            <td><?= $requirementInteraction->has('requirement_active_ingredient') ? $this->Html->link($requirementInteraction->requirement_active_ingredient->id, ['controller' => 'RequirementActiveIngredients', 'action' => 'view', $requirementInteraction->requirement_active_ingredient->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Interaction Family Name 1') ?></th>
            <td><?= h($requirementInteraction->interaction_family_name_1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Interaction Family Name 2') ?></th>
            <td><?= h($requirementInteraction->interaction_family_name_2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($requirementInteraction->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Interaction Family 1 Id') ?></th>
            <td><?= $this->Number->format($requirementInteraction->interaction_family_1_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Interaction Family 2 Id') ?></th>
            <td><?= $this->Number->format($requirementInteraction->interaction_family_2_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($requirementInteraction->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($requirementInteraction->modified) ?></td>
        </tr>
    </table>
</div>
