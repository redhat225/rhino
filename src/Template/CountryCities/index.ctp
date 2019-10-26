<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Country City'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Countries'), ['controller' => 'Countries', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Country'), ['controller' => 'Countries', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Country Townships'), ['controller' => 'CountryTownships', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Country Township'), ['controller' => 'CountryTownships', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="countryCities index large-9 medium-8 columns content">
    <h3><?= __('Country Cities') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('label_city') ?></th>
                <th scope="col"><?= $this->Paginator->sort('country_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($countryCities as $countryCity): ?>
            <tr>
                <td><?= $this->Number->format($countryCity->id) ?></td>
                <td><?= h($countryCity->label_city) ?></td>
                <td><?= $countryCity->has('country') ? $this->Html->link($countryCity->country->id, ['controller' => 'Countries', 'action' => 'view', $countryCity->country->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $countryCity->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $countryCity->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $countryCity->id], ['confirm' => __('Are you sure you want to delete # {0}?', $countryCity->id)]) ?>
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
