<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Requirement Route Administration Type'), ['action' => 'edit', $requirementRouteAdministrationType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Requirement Route Administration Type'), ['action' => 'delete', $requirementRouteAdministrationType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requirementRouteAdministrationType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Requirement Route Administration Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Requirement Route Administration Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Requirement Route Administrations'), ['controller' => 'RequirementRouteAdministrations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Requirement Route Administration'), ['controller' => 'RequirementRouteAdministrations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="requirementRouteAdministrationTypes view large-9 medium-8 columns content">
    <h3><?= h($requirementRouteAdministrationType->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Type Label') ?></th>
            <td><?= h($requirementRouteAdministrationType->type_label) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($requirementRouteAdministrationType->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Requirement Route Administrations') ?></h4>
        <?php if (!empty($requirementRouteAdministrationType->requirement_route_administrations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Requirement Route Administration Type Id') ?></th>
                <th scope="col"><?= __('Requirement Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($requirementRouteAdministrationType->requirement_route_administrations as $requirementRouteAdministrations): ?>
            <tr>
                <td><?= h($requirementRouteAdministrations->id) ?></td>
                <td><?= h($requirementRouteAdministrations->requirement_route_administration_type_id) ?></td>
                <td><?= h($requirementRouteAdministrations->requirement_id) ?></td>
                <td><?= h($requirementRouteAdministrations->created) ?></td>
                <td><?= h($requirementRouteAdministrations->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'RequirementRouteAdministrations', 'action' => 'view', $requirementRouteAdministrations->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'RequirementRouteAdministrations', 'action' => 'edit', $requirementRouteAdministrations->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'RequirementRouteAdministrations', 'action' => 'delete', $requirementRouteAdministrations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requirementRouteAdministrations->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
