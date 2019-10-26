<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Country Township'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Country Cities'), ['controller' => 'CountryCities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Country City'), ['controller' => 'CountryCities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Institutions'), ['controller' => 'Institutions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Institution'), ['controller' => 'Institutions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List People Adresses'), ['controller' => 'PeopleAdresses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New People Adress'), ['controller' => 'PeopleAdresses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Requirement Holders'), ['controller' => 'RequirementHolders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Requirement Holder'), ['controller' => 'RequirementHolders', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="countryTownships index large-9 medium-8 columns content">
    <h3><?= __('Country Townships') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('country_city_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('label_township') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($countryTownships as $countryTownship): ?>
            <tr>
                <td><?= $this->Number->format($countryTownship->id) ?></td>
                <td><?= $countryTownship->has('country_city') ? $this->Html->link($countryTownship->country_city->id, ['controller' => 'CountryCities', 'action' => 'view', $countryTownship->country_city->id]) : '' ?></td>
                <td><?= h($countryTownship->label_township) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $countryTownship->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $countryTownship->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $countryTownship->id], ['confirm' => __('Are you sure you want to delete # {0}?', $countryTownship->id)]) ?>
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
