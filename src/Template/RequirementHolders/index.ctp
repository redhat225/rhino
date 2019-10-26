<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Requirement Holder'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Country Townships'), ['controller' => 'CountryTownships', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Country Township'), ['controller' => 'CountryTownships', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Requirement Holder Details'), ['controller' => 'RequirementHolderDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Requirement Holder Detail'), ['controller' => 'RequirementHolderDetails', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="requirementHolders index large-9 medium-8 columns content">
    <h3><?= __('Requirement Holders') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('holder_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('holder_adress') ?></th>
                <th scope="col"><?= $this->Paginator->sort('holder_contact') ?></th>
                <th scope="col"><?= $this->Paginator->sort('country_township_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($requirementHolders as $requirementHolder): ?>
            <tr>
                <td><?= $this->Number->format($requirementHolder->id) ?></td>
                <td><?= h($requirementHolder->holder_name) ?></td>
                <td><?= h($requirementHolder->holder_adress) ?></td>
                <td><?= h($requirementHolder->holder_contact) ?></td>
                <td><?= $requirementHolder->has('country_township') ? $this->Html->link($requirementHolder->country_township->id, ['controller' => 'CountryTownships', 'action' => 'view', $requirementHolder->country_township->id]) : '' ?></td>
                <td><?= h($requirementHolder->created) ?></td>
                <td><?= h($requirementHolder->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $requirementHolder->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $requirementHolder->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $requirementHolder->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requirementHolder->id)]) ?>
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
