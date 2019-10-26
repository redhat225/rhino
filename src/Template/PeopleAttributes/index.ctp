<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New People Attribute'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List People'), ['controller' => 'People', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Person'), ['controller' => 'People', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="peopleAttributes index large-9 medium-8 columns content">
    <h3><?= __('People Attributes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('people_id') ?></th>
                <th><?= $this->Paginator->sort('height') ?></th>
                <th><?= $this->Paginator->sort('skin') ?></th>
                <th><?= $this->Paginator->sort('eyes') ?></th>
                <th><?= $this->Paginator->sort('haircolour') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($peopleAttributes as $peopleAttribute): ?>
            <tr>
                <td><?= $this->Number->format($peopleAttribute->id) ?></td>
                <td><?= $peopleAttribute->has('person') ? $this->Html->link($peopleAttribute->person->id, ['controller' => 'People', 'action' => 'view', $peopleAttribute->person->id]) : '' ?></td>
                <td><?= $this->Number->format($peopleAttribute->height) ?></td>
                <td><?= h($peopleAttribute->skin) ?></td>
                <td><?= h($peopleAttribute->eyes) ?></td>
                <td><?= h($peopleAttribute->haircolour) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $peopleAttribute->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $peopleAttribute->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $peopleAttribute->id], ['confirm' => __('Are you sure you want to delete # {0}?', $peopleAttribute->id)]) ?>
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
