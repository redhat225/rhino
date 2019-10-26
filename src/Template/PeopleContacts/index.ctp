<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New People Contact'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List People'), ['controller' => 'People', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Person'), ['controller' => 'People', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="peopleContacts index large-9 medium-8 columns content">
    <h3><?= __('People Contacts') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('contact1') ?></th>
                <th><?= $this->Paginator->sort('contact2') ?></th>
                <th><?= $this->Paginator->sort('people_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($peopleContacts as $peopleContact): ?>
            <tr>
                <td><?= $this->Number->format($peopleContact->id) ?></td>
                <td><?= h($peopleContact->contact1) ?></td>
                <td><?= h($peopleContact->contact2) ?></td>
                <td><?= $peopleContact->has('person') ? $this->Html->link($peopleContact->person->id, ['controller' => 'People', 'action' => 'view', $peopleContact->person->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $peopleContact->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $peopleContact->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $peopleContact->id], ['confirm' => __('Are you sure you want to delete # {0}?', $peopleContact->id)]) ?>
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
