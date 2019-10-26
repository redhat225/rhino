<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Requirement Route Administration'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Requirement Route Administration Types'), ['controller' => 'RequirementRouteAdministrationTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Requirement Route Administration Type'), ['controller' => 'RequirementRouteAdministrationTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Requirements'), ['controller' => 'Requirements', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Requirement'), ['controller' => 'Requirements', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="requirementRouteAdministrations index large-9 medium-8 columns content">
    <h3><?= __('Requirement Route Administrations') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('requirement_route_administration_type_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('requirement_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($requirementRouteAdministrations as $requirementRouteAdministration): ?>
            <tr>
                <td><?= $this->Number->format($requirementRouteAdministration->id) ?></td>
                <td><?= $requirementRouteAdministration->has('requirement_route_administration_type') ? $this->Html->link($requirementRouteAdministration->requirement_route_administration_type->id, ['controller' => 'RequirementRouteAdministrationTypes', 'action' => 'view', $requirementRouteAdministration->requirement_route_administration_type->id]) : '' ?></td>
                <td><?= $requirementRouteAdministration->has('requirement') ? $this->Html->link($requirementRouteAdministration->requirement->id, ['controller' => 'Requirements', 'action' => 'view', $requirementRouteAdministration->requirement->id]) : '' ?></td>
                <td><?= h($requirementRouteAdministration->created) ?></td>
                <td><?= h($requirementRouteAdministration->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $requirementRouteAdministration->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $requirementRouteAdministration->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $requirementRouteAdministration->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requirementRouteAdministration->id)]) ?>
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
