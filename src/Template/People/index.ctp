<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Person'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="people index large-9 medium-8 columns content">
    <h3><?= __('People') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('updated_by') ?></th>
                <th><?= $this->Paginator->sort('lastname') ?></th>
                <th><?= $this->Paginator->sort('firstname') ?></th>
                <th><?= $this->Paginator->sort('dateborn') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('created_by') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th><?= $this->Paginator->sort('deleted') ?></th>
                <th><?= $this->Paginator->sort('bornplace') ?></th>
                <th><?= $this->Paginator->sort('nationality') ?></th>
                <th><?= $this->Paginator->sort('blood') ?></th>
                <th><?= $this->Paginator->sort('rhesus') ?></th>
                <th><?= $this->Paginator->sort('path_pic') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($people as $person): ?>
            <tr>
                <td><?= $this->Number->format($person->id) ?></td>
                <td><?= $this->Number->format($person->updated_by) ?></td>
                <td><?= h($person->lastname) ?></td>
                <td><?= h($person->firstname) ?></td>
                <td><?= h($person->dateborn) ?></td>
                <td><?= h($person->created) ?></td>
                <td><?= $this->Number->format($person->created_by) ?></td>
                <td><?= h($person->modified) ?></td>
                <td><?= h($person->deleted) ?></td>
                <td><?= h($person->bornplace) ?></td>
                <td><?= h($person->nationality) ?></td>
                <td><?= h($person->blood) ?></td>
                <td><?= h($person->rhesus) ?></td>
                <td><?= h($person->path_pic) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $person->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $person->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $person->id], ['confirm' => __('Are you sure you want to delete # {0}?', $person->id)]) ?>
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
