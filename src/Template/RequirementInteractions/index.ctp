<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Requirement Interaction'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Requirement Active Ingredients'), ['controller' => 'RequirementActiveIngredients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Requirement Active Ingredient'), ['controller' => 'RequirementActiveIngredients', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="requirementInteractions index large-9 medium-8 columns content">
    <h3><?= __('Requirement Interactions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('requirement_active_ingredient_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('interaction_family_name_1') ?></th>
                <th scope="col"><?= $this->Paginator->sort('interaction_family_1_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('interaction_family_name_2') ?></th>
                <th scope="col"><?= $this->Paginator->sort('interaction_family_2_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($requirementInteractions as $requirementInteraction): ?>
            <tr>
                <td><?= $this->Number->format($requirementInteraction->id) ?></td>
                <td><?= $requirementInteraction->has('requirement_active_ingredient') ? $this->Html->link($requirementInteraction->requirement_active_ingredient->id, ['controller' => 'RequirementActiveIngredients', 'action' => 'view', $requirementInteraction->requirement_active_ingredient->id]) : '' ?></td>
                <td><?= h($requirementInteraction->interaction_family_name_1) ?></td>
                <td><?= $this->Number->format($requirementInteraction->interaction_family_1_id) ?></td>
                <td><?= h($requirementInteraction->interaction_family_name_2) ?></td>
                <td><?= $this->Number->format($requirementInteraction->interaction_family_2_id) ?></td>
                <td><?= h($requirementInteraction->created) ?></td>
                <td><?= h($requirementInteraction->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $requirementInteraction->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $requirementInteraction->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $requirementInteraction->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requirementInteraction->id)]) ?>
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
