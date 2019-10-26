<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New People Descendant'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List People'), ['controller' => 'People', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Person'), ['controller' => 'People', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="peopleDescendants index large-9 medium-8 columns content">
    <h3><?= __('People Descendants') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('people_id') ?></th>
                <th><?= $this->Paginator->sort('firstname') ?></th>
                <th><?= $this->Paginator->sort('lastname') ?></th>
                <th><?= $this->Paginator->sort('sexe') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($peopleDescendants as $peopleDescendant): ?>
            <tr>
                <td><?= $this->Number->format($peopleDescendant->id) ?></td>
                <td><?= $peopleDescendant->has('person') ? $this->Html->link($peopleDescendant->person->id, ['controller' => 'People', 'action' => 'view', $peopleDescendant->person->id]) : '' ?></td>
                <td><?= h($peopleDescendant->firstname) ?></td>
                <td><?= h($peopleDescendant->lastname) ?></td>
                <td><?= h($peopleDescendant->sexe) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $peopleDescendant->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $peopleDescendant->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $peopleDescendant->id], ['confirm' => __('Are you sure you want to delete # {0}?', $peopleDescendant->id)]) ?>
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
