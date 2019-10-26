<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Requirement Route Administration Type'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Requirement Route Administrations'), ['controller' => 'RequirementRouteAdministrations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Requirement Route Administration'), ['controller' => 'RequirementRouteAdministrations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="requirementRouteAdministrationTypes index large-9 medium-8 columns content">
    <h3><?= __('Requirement Route Administration Types') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type_label') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($requirementRouteAdministrationTypes as $requirementRouteAdministrationType): ?>
            <tr>
                <td><?= $this->Number->format($requirementRouteAdministrationType->id) ?></td>
                <td><?= h($requirementRouteAdministrationType->type_label) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $requirementRouteAdministrationType->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $requirementRouteAdministrationType->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $requirementRouteAdministrationType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requirementRouteAdministrationType->id)]) ?>
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
