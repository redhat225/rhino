<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Requirement'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Requirement Compositions'), ['controller' => 'RequirementCompositions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Requirement Composition'), ['controller' => 'RequirementCompositions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Requirement Holder Details'), ['controller' => 'RequirementHolderDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Requirement Holder Detail'), ['controller' => 'RequirementHolderDetails', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Requirement Issue Lists'), ['controller' => 'RequirementIssueLists', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Requirement Issue List'), ['controller' => 'RequirementIssueLists', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Requirement Presentations'), ['controller' => 'RequirementPresentations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Requirement Presentation'), ['controller' => 'RequirementPresentations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Requirement Route Administrations'), ['controller' => 'RequirementRouteAdministrations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Requirement Route Administration'), ['controller' => 'RequirementRouteAdministrations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Requirement Significant Informations'), ['controller' => 'RequirementSignificantInformations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Requirement Significant Information'), ['controller' => 'RequirementSignificantInformations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Treatment Requirements'), ['controller' => 'TreatmentRequirements', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Treatment Requirement'), ['controller' => 'TreatmentRequirements', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="requirements index large-9 medium-8 columns content">
    <h3><?= __('Requirements') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('requirement_denomination') ?></th>
                <th scope="col"><?= $this->Paginator->sort('requirement_dmp_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('requirement_pharma_form') ?></th>
                <th scope="col"><?= $this->Paginator->sort('requirement_homeopathic') ?></th>
                <th scope="col"><?= $this->Paginator->sort('requirement_security') ?></th>
                <th scope="col"><?= $this->Paginator->sort('requirement_state_selling') ?></th>
                <th scope="col"><?= $this->Paginator->sort('requirement_status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('requirement_authorization_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('requirement_date_auth_selling') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($requirements as $requirement): ?>
            <tr>
                <td><?= $this->Number->format($requirement->id) ?></td>
                <td><?= h($requirement->requirement_denomination) ?></td>
                <td><?= h($requirement->requirement_dmp_code) ?></td>
                <td><?= h($requirement->requirement_pharma_form) ?></td>
                <td><?= h($requirement->requirement_homeopathic) ?></td>
                <td><?= h($requirement->requirement_security) ?></td>
                <td><?= h($requirement->requirement_state_selling) ?></td>
                <td><?= h($requirement->requirement_status) ?></td>
                <td><?= h($requirement->requirement_authorization_number) ?></td>
                <td><?= h($requirement->requirement_date_auth_selling) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $requirement->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $requirement->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $requirement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requirement->id)]) ?>
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
