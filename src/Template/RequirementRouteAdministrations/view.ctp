<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Requirement Route Administration'), ['action' => 'edit', $requirementRouteAdministration->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Requirement Route Administration'), ['action' => 'delete', $requirementRouteAdministration->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requirementRouteAdministration->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Requirement Route Administrations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Requirement Route Administration'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Requirement Route Administration Types'), ['controller' => 'RequirementRouteAdministrationTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Requirement Route Administration Type'), ['controller' => 'RequirementRouteAdministrationTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Requirements'), ['controller' => 'Requirements', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Requirement'), ['controller' => 'Requirements', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="requirementRouteAdministrations view large-9 medium-8 columns content">
    <h3><?= h($requirementRouteAdministration->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Requirement Route Administration Type') ?></th>
            <td><?= $requirementRouteAdministration->has('requirement_route_administration_type') ? $this->Html->link($requirementRouteAdministration->requirement_route_administration_type->id, ['controller' => 'RequirementRouteAdministrationTypes', 'action' => 'view', $requirementRouteAdministration->requirement_route_administration_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Requirement') ?></th>
            <td><?= $requirementRouteAdministration->has('requirement') ? $this->Html->link($requirementRouteAdministration->requirement->id, ['controller' => 'Requirements', 'action' => 'view', $requirementRouteAdministration->requirement->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($requirementRouteAdministration->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($requirementRouteAdministration->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($requirementRouteAdministration->modified) ?></td>
        </tr>
    </table>
</div>
