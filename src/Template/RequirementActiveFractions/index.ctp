<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Requirement Active Fraction'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Requirement Ingredient Fractions'), ['controller' => 'RequirementIngredientFractions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Requirement Ingredient Fraction'), ['controller' => 'RequirementIngredientFractions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="requirementActiveFractions index large-9 medium-8 columns content">
    <h3><?= __('Requirement Active Fractions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fraction_label') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($requirementActiveFractions as $requirementActiveFraction): ?>
            <tr>
                <td><?= $this->Number->format($requirementActiveFraction->id) ?></td>
                <td><?= h($requirementActiveFraction->fraction_label) ?></td>
                <td><?= h($requirementActiveFraction->created) ?></td>
                <td><?= h($requirementActiveFraction->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $requirementActiveFraction->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $requirementActiveFraction->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $requirementActiveFraction->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requirementActiveFraction->id)]) ?>
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
