<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New People Adress'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List People'), ['controller' => 'People', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Person'), ['controller' => 'People', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="peopleAdresses index large-9 medium-8 columns content">
    <h3><?= __('People Adresses') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('people_id') ?></th>
                <th><?= $this->Paginator->sort('city_quarter') ?></th>
                <th><?= $this->Paginator->sort('city') ?></th>
                <th><?= $this->Paginator->sort('country') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($peopleAdresses as $peopleAdress): ?>
            <tr>
                <td><?= $this->Number->format($peopleAdress->id) ?></td>
                <td><?= $peopleAdress->has('person') ? $this->Html->link($peopleAdress->person->id, ['controller' => 'People', 'action' => 'view', $peopleAdress->person->id]) : '' ?></td>
                <td><?= h($peopleAdress->city_quarter) ?></td>
                <td><?= h($peopleAdress->city) ?></td>
                <td><?= h($peopleAdress->country) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $peopleAdress->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $peopleAdress->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $peopleAdress->id], ['confirm' => __('Are you sure you want to delete # {0}?', $peopleAdress->id)]) ?>
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
